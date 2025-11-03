<?php

namespace App\Http\Controllers;

use App\Models\Espacios;
use Illuminate\Http\Request;

class EspaciosController extends Controller
{
  
    public function index()
    {
        $espacios = Espacios::all();
        return $espacios;
    }


   
    public function create()
    {
        //
    }

   
    public function store(Request $request)
    {
        //
        $espacio = new Espacios();
        $espacio->nombre = $request->nombre;
        $espacio->descripcion = $request->descripcion;
        $espacio->aforo = $request->aforo;
        $espacio->idLocalizaciones = $request->idLocalizaciones;


        $espacio->save();
        return "Guardado exitosamente";
    }

    
    public function show($id)
    {
        $espacio = Espacios::select()
            ->where('idLocalizaciones', '=', $id)
            ->get();
        return  $espacio;
        //
    }
    public function showR($id)
    {
        $espacio = Espacios::select()
            ->where('id', '=', $id)
            ->get();
        return  $espacio;
        //
    }

   
    public function edit(Espacios $espacios)
    {
        //
    }

  
    public function update(Request $request)
    {
        //  
        $espacio = Espacios::select()
            ->where('id', '=', $request->id)
            ->first();
        $espacio->nombre = $request->nombre;
        $espacio->descripcion = $request->descripcion;
        $espacio->aforo = $request->aforo;
        $espacio->idLocalizaciones = $request->idLocalizaciones;
        $espacio->save();
        return  $espacio;
    }

    
    public function destroy(Request $request)
    {
        $espacio = Espacios::destroy($request->id);
        return $espacio;
        //
    }
  
}
