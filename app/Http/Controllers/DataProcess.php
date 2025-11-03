<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Models\Reservas;
use App\Models\User;
use App\Models\Claves;
use Illuminate\Support\Facades\Validator;

class DataProcess extends Controller
{
    public function dHor(Request $request){
       return eliminarHD($request->idEs,$request->dSem);
    }
    
    public function listarHorasEsp($id){
        return ordenarDiasSemana(generarHorarios($id));
    }

    public function generarCalendario($espacio, $fecha)
    {

        return obtenerReservas($espacio, $fecha);
    }
    public function comprobacionHoraria($hInicio,$hFin, $idEs, $diaSem){
        return ( calcularHorasNoAsignadas($hInicio,$hFin, $idEs, $diaSem)) ? "T" : "F";
    }

    public function comprobarReservas($idUser)
    {
        return reservasUsuario($idUser);
    }
    public function insertReserva(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'fecha'      => 'required|String',
            'hora'     => 'required|String',
            'duracion'  => 'required|String',
            'idEspacios'     => 'required|String',
            'idUsers'  => 'required|String'
        ], $messages = [
            'required' => 'El campo :attribute requerido.',
            'integer' => 'El campo :attribute es un numero',
        ]);

        if ($validator->fails()) {
            return response()->json(["message" => $request->fecha . " " . $request->hora . " " . $request->duracion . " " . $request->idEspacios . " " . $request->idUsers]);
        }





        $reserva = new Reservas();
        $reserva->fecha = $request->fecha;
        $reserva->hora = $request->hora;
        $reserva->duracion = $request->duracion;
        $reserva->idEspacios = $request->idEspacios;
        $reserva->idUsers = $request->idUsers;

        if (comprobarDisponibilidad($reserva->hora, $reserva->fecha, $reserva->idEspacios)) {

            return   app('App\Http\Controllers\ReservasController')->store($reserva);
        } else
            return  response()->json(["message" =>  "Hora o Fecha no disponible"]);
    }
    public function mostrarReservas()
    {
        $reservas = app('App\Http\Controllers\ReservasController')->index();
        $espacios = app('App\Http\Controllers\EspaciosController')->index();
        $usuarios =   User::all();
        $aux = [];
        foreach ($reservas as $row) {

            foreach ($espacios as $row2) {
                if ($row2->id == $row->idEspacios) {
                    $row->idEspacios = $row2->nombre;
                }
            }
            foreach ($usuarios as $row2) {
                if ($row2->id == $row->idUsers) {
                    $row->idUsers = $row2->usuario;
                }
            }
            array_push($aux, $row);
        }
        return $aux;
    }
    public function mostrarUsuarios()
    {

        $usuarios =   User::all();

        return $usuarios;
    }
    public function comprobarClave($val)
    {
        $claves = Claves::all();
        foreach ($claves as $row) {
            if ($val == $row->clave) {
                Claves::destroy($row->id);
                return true;
            }
        }



        return false;
    }
    public function generarClave()
    {
        $clave = "";
        for ($i = 0; $i < 10; $i++) {
            $clave .= chr(rand('97', '122'));
        }
        $claves = new  Claves();
        $claves->clave = $clave;
        $claves->save();
        return $clave;
    }

    public function borrarUser(Request $request)
    {

        $usuarios =   User::destroy($request->id);

        return "Eliminado correctamente";
    }
    public function mostrarEspacios()
    {
        $localizaciones = app('App\Http\Controllers\LocalizacionesController')->index();
        $espacios = app('App\Http\Controllers\EspaciosController')->index();

        $aux = [];
        foreach ($espacios as $row) {

            foreach ($localizaciones as $row2) {
                if ($row2->id == $row->idLocalizaciones) {
                    $row->idLocalizaciones = $row2->nombre;
                }
            }
            array_push($aux, $row);
        }


        return $aux;
    }
    public function generarEspaciosHorarios($idLoc)
    {
        $espacios = generarEspacios($idLoc);
        $send = [];
        foreach ($espacios as $row) {


            $horarios = generarHorarios($row["id"]);



            array_push(
                $send,
                [
                    "id" => $row["id"],
                    "nombre" => $row["nombre"],
                    "descripcion" => $row["descripcion"],
                    "aforo" => $row["aforo"],
                    "idLocalizaciones" => $row["idLocalizaciones"],
                    "horarios" => ordenarDiasSemana(generarHorarios($row["id"]))

                ]
            );
        }
        return response()->json($send);
    }

    //
}
function calcularReservas($fecha)
{
    $value = app('App\Http\Controllers\ReservasController')->index();
    $aux = [];
    foreach ($value as $row) {
        if ($row->fecha == $fecha)
            array_push($aux, $row);
    }
    return $aux;
}
//coge un horario y lo desglosa
function calcularH($hora, $hFin, $iHorario, $disponible, $rest)
{
    $array = [];
    $h = $hora;
    $valora = Carbon::createFromTime(explode(":", $h)[0], explode(":", $h)[1]);

    $valora->addMinutes($iHorario);

    if ($rest == $disponible && (explode(":", $h)[0] < explode(":", $hFin)[0] || explode(":", $h)[1] < explode(":", $hFin)[1])) {
        $h = $valora->hour . ":" . $valora->minute;
        $array = calcularH($valora->format('H:i'), $hFin, $iHorario, $disponible, $rest);


        array_push($array, $hora);
    }
    sort($array);
    return $array;
}
function generarEspacios($idLoc)
{
    $value = app('App\Http\Controllers\EspaciosController')->index();

    $aux = [];
    foreach ($value as $row) {
        if ($row->idLocalizaciones == $idLoc)
            array_push($aux, $row);
    }
    return $aux;
}
function generarHorarios($idEs)
{
    $value = app('App\Http\Controllers\HorariosHasEspaciosController')->index();
    $value2 = app('App\Http\Controllers\HorariosController')->index();

    $aux = [];

    foreach ($value as $row) {
        if ($row->idEspacios == $idEs) {
            foreach ($value2 as $row2) {
                if ($row2->id == $row->idHorarios) {
                    array_push($aux, $row2);
                    break;
                }
            }
        }
    }
    return $aux;
}
function ordenarDiasSemana($horarios)
{
    $dSem = ["Lunes" => "", "Martes" => "", "Miércoles" => "", "Jueves" => "", "Viernes" => "", "Sábado" => "", "Domingo" => ""];
    foreach ($horarios as $row) {
        switch ($row->diaSemana) {
            case 'L':
                $dSem["Lunes"] = $dSem["Lunes"] . $row->horaInicio . "-" . $row->horaFin . ",";
                break;
            case 'M':
                $dSem["Martes"] = $dSem["Martes"] . $row->horaInicio . "-" . $row->horaFin . ",";
                break;
            case 'X':
                $dSem["Miércoles"] = $dSem["Miércoles"] . $row->horaInicio . "-" . $row->horaFin . ",";
                break;
            case 'J':
                $dSem["Jueves"] = $dSem["Jueves"] . $row->horaInicio . "-" . $row->horaFin . ",";
                break;
            case 'V':
                $dSem["Viernes"] = $dSem["Viernes"] . $row->horaInicio . "-" . $row->horaFin . ",";
                break;
            case 'S':
                $dSem["Sábado"] = $dSem["Sábado"] . $row->horaInicio . "-" . $row->horaFin . ",";
                break;
            case 'D':
                $dSem["Domingo"] = $dSem["Domingo"] . $row->horaInicio . "-" . $row->horaFin . ",";
                break;
        }
    }
    $dSem["Lunes"] = substr($dSem["Lunes"], 0, -1);
    $dSem["Martes"] = substr($dSem["Martes"], 0, -1);
    $dSem["Miércoles"] = substr($dSem["Miércoles"], 0, -1);
    $dSem["Jueves"] = substr($dSem["Jueves"], 0, -1);
    $dSem["Viernes"] = substr($dSem["Viernes"], 0, -1);
    $dSem["Sábado"] = substr($dSem["Sábado"], 0, -1);
    $dSem["Domingo"] = substr($dSem["Domingo"], 0, -1);
    return $dSem;
}

function obtenerReservas($idEs, $fecha)
{


    $value = generarHorarios($idEs);
    $aux = [];
    $reservas = calcularReservas($fecha);
    foreach ($value as $row) {

        $array = calcularH($row->horaInicio, $row->horaFin, $row->intervaloHorario, $row->diaSemana, calcularDiaSemana(Carbon::create(explode("-", $fecha)[2], explode("-", $fecha)[1], explode("-", $fecha)[0])->format("l")));

        foreach ($array as $hora) {
            $bool = false;
            foreach ($reservas as $reserva)
                if ($reserva->hora == $hora && $reserva->estado != "Cancelado")
                    $bool = true;



            if ($bool)
                array_push($aux, ["hora" => $hora, "estado" => "reservado", "duracion" => $row->intervaloHorario]);
            else
                array_push($aux, ["hora" => $hora, "estado" => "libre", "duracion" => $row->intervaloHorario]);
        }
    }
    return $aux;
}

function calcularDiaSemana($dia)
{
    switch ($dia) {
        case 'Monday':
            return 'L';
            break;
        case 'Tuesday':
            return 'M';
        case 'Wednesday':
            return 'X';
            break;
        case 'Thursday':
            return 'J';
            break;
        case 'Friday':
            return 'V';
            break;
        case 'Saturday':
            return 'S';
            break;
        case 'Sunday':
            return 'D';
            break;
    }
}
function comprobarDisponibilidad($hora, $fecha, $idEs)
{
    $val = obtenerReservas($idEs, $fecha);

    foreach ($val as $row) {

        if ($row["hora"] == $hora) {

            if ($row["estado"] == "libre")
                return true;

            else
                return false;
        }
    }
    return false;
}
function calcularHorasNoAsignadas($hInicio, $hFin, $idEs, $dSemana)
{
    $value = generarHorarios($idEs);
    foreach ($value as $row) {

        $array = calcularH($row->horaInicio, $row->horaFin, 15, $row->diaSemana, $dSemana);
        foreach ($array as $hora) {
            if ($hora == $hInicio || $hora == $hFin)
                return false;
        }
    }
    return true;
}
function reservasUsuario($idUser)
{
    $value = app('App\Http\Controllers\ReservasController')->index();
    $value2 = app('App\Http\Controllers\EspaciosController')->index();

    $aux = [];
    foreach ($value as $row) {
        if ($row->idUsers == $idUser && $row->estado == "Activo")
            foreach ($value2 as $row2) {
                if ($row2->id == $row->idEspacios) {
                    $row->idEspacios = $row2->nombre;
                    array_push($aux, $row);
                }
            }
    }
    return $aux;
}
function eliminarHD($idEs,$dSem){
    $hHE = app('App\Http\Controllers\HorariosHasEspaciosController')->index();
    $espacios = app('App\Http\Controllers\EspaciosController')->showR($idEs);
    
    foreach ($hHE as $row) {
        if($row->idEspacios==$espacios[0]->id){
            $val=app('App\Http\Controllers\HorariosController')->show($row->idHorarios);
          
            if($val[0]->diaSemana==$dSem){
                app('App\Http\Controllers\HorariosController')->delete($val[0]->id);
                
            }
          

        }

    }
}

