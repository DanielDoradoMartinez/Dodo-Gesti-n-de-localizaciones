<?php

namespace App\Http\Controllers;

use App\Models\Horarios;
use Illuminate\Http\Request;

class HorariosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $horarios = Horarios::all();
        return $horarios;
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
    public function store(Request $request)
    {
        $horario = new Horarios();
        $horario->horaInicio = $request->HI;
        $horario->HoraFin = $request->HF;
        $horario->diaSemana = $request->diaS;
        $horario->intervaloHorario = $request->duracion;
        $horario->save();
        app('App\Http\Controllers\HorariosHasEspaciosController')->store($request->idEs,$horario->id);
        return   $horario;
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Horarios  $horarios
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $hor = Horarios::select()
        ->where('id', '=', $id)
        ->get();
    return  $hor;
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Horarios  $horarios
     * @return \Illuminate\Http\Response
     */
    public function edit(Horarios $horarios)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Horarios  $horarios
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Horarios $horarios)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Horarios  $horarios
     * @return \Illuminate\Http\Response
     */
    public function destroy(Horarios $horarios)
    {
        //
    }
    public function delete($id)
    {
        $hor = Horarios::destroy($id);
        return $hor;
        //
    }
}
