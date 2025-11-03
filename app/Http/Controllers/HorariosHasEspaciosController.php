<?php

namespace App\Http\Controllers;

use App\Models\HorariosHasEspacios;
use Illuminate\Http\Request;

class HorariosHasEspaciosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $var = HorariosHasEspacios::all();
        return $var;
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
    public function store($idEs, $idH)
    {
        $horario =new HorariosHasEspacios();
    $horario->idEspacios = $idEs;
    $horario->idHorarios = $idH;
   
    $horario->save();
    return  $horario;
}

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\HorariosHasEspacios  $horariosHasEspacios
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\HorariosHasEspacios  $horariosHasEspacios
     * @return \Illuminate\Http\Response
     */
    public function edit(HorariosHasEspacios $horariosHasEspacios)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\HorariosHasEspacios  $horariosHasEspacios
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, HorariosHasEspacios $horariosHasEspacios)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\HorariosHasEspacios  $horariosHasEspacios
     * @return \Illuminate\Http\Response
     */
    public function destroy(HorariosHasEspacios $horariosHasEspacios)
    {
        //
    }
}
