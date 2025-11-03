<?php

namespace App\Http\Controllers;

use App\Models\Reservas;
use Illuminate\Http\Request;

class ReservasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    { 
        $reserva=Reservas::all();
 
        return $reserva;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
     
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Reservas $request)
    {
        $reserva = new Reservas();
        $reserva->fecha = $request->fecha;
        $reserva->hora = $request->hora;
        $reserva->duracion = $request->duracion;
        $reserva->idEspacios = $request->idEspacios;
        $reserva->idUsers = $request->idUsers;
        $reserva->estado = "Activo";
        $reserva->save();
        
        return    response()->json(["message"=>"Se ha realizado la reserva"]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Reservas  $reservas
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request)
    {
        $reserva =Reservas::select()
        ->where('id','=',$request->id)
        ->first();
        return  $reserva;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Reservas  $reservas
     * @return \Illuminate\Http\Response
     */
    public function edit(Reservas $reservas)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Reservas  $reservas
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $reserva =Reservas::select()
        ->where('id','=',$request->id)
        ->first();
        
        $reserva->estado = "Cancelado";
        $reserva->save();
        return  response()->json(["message"=>"Cancelado con éxito"]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Reservas  $reservas
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        return $request->id;
        $reserva = Reservas::destroy($request->id);
        return $reserva;
        //
    }
}
