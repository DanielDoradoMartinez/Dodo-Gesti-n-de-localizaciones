<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Localizaciones;

class LocalizacionesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $localizaciones=Localizaciones::all();
        return $localizaciones;
    }

    

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $localizacion = new Localizaciones();
        $localizacion->nombre = $request->nombre;
        $localizacion->direccion = $request->direccion;
        

        $localizacion->save();
        return "Todo Correcto";
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request)
    {
        $localizacion =Localizaciones::select()
        ->where('id','=',$request->id)
        ->first();
        return  $localizacion;
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $localizacion =Localizaciones::select()
        ->where('id','=',$request->id)
        ->first();
        
        $localizacion->nombre = $request->nombre;
        $localizacion->direccion = $request->direccion;
        $localizacion->save();
        return  $localizacion;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $localizacion = Localizaciones::destroy($request->id);
        return $localizacion;
        //
    }
}
