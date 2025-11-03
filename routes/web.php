<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
Route::get('/',function(){
    return redirect('home');
})->middleware('admin');
Route::get('dHor', 'App\Http\Controllers\DataProcess@dHor')->middleware('auth','admin');
Route::post('/dReserva','App\Http\Controllers\ReservasController@update')->middleware('auth','admin');
Route::post('/dEspacio','App\Http\Controllers\EspaciosController@destroy')->middleware('auth','admin');
Route::post('/dLocalizacion','App\Http\Controllers\LocalizacionesController@destroy');
Route::get('/insertLoc','App\Http\Controllers\LocalizacionesController@store')->middleware('auth','admin');
Route::get('/insertEs','App\Http\Controllers\EspaciosController@store')->middleware('auth','admin');
Route::get('/getLoc','App\Http\Controllers\LocalizacionesController@index')->middleware('auth','admin');
Route::get('/keygen','App\Http\Controllers\DataProcess@generarClave')->middleware('auth','admin');
Route::get('/comH/{hInicio}/{hFin}/{idEs}/{diaSem}','App\Http\Controllers\DataProcess@comprobacionHoraria')->middleware('auth','admin');
Route::get('/añadirHorario', 'App\Http\Controllers\HorariosController@store')->middleware('auth','admin');
Auth::routes();
Route::get('/getReservasT', function(){
   $var=app('App\Http\Controllers\DataProcess')->mostrarReservas();
    $end=["data"=> $var];
    return $end;
})->middleware('auth','admin');

Route::get('/getHEs/{id}', 'App\Http\Controllers\DataProcess@listarHorasEsp');
Route::get('/getLocT', function(){
    $var=app('App\Http\Controllers\LocalizacionesController')->index();
   
    $end=["data"=> json_decode($var,true)];
    return $end;
})->middleware('auth','admin');
Route::get('/getEsT', function(){
   $var=app('App\Http\Controllers\DataProcess')->mostrarEspacios();
   
    $end=["data"=> $var];
    return $end;
})->middleware('auth','admin');
Route::post('/dUser','App\Http\Controllers\DataProcess@borrarUser')->middleware('auth','admin');
Route::get('/getUsers', function(){
    $var=app('App\Http\Controllers\DataProcess')->mostrarUsuarios();
    
     $end=["data"=> $var];
     return $end;
 })->middleware('auth','admin');
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/tReservas', function(){
    return view('vistaReservas');
})->name('reservas')->middleware('auth','admin');
Route::get('/tLocalizaciones', function(){
    return view('vistaLocalizaciones');
})->name('localizaciones')->middleware('auth','admin');
Route::get('/tEspacios', function(){
    return view('vistaEspacios');
})->name('espacios')->middleware('auth','admin');
Route::get('/tUsers', function(){
    return view('vistaUsuarios');
})->name('usuarios')->middleware('auth','admin');
Route::get('/vistaDetalladaEspacios', function(){
    return view('vistaDetEspacios');
})->name('vDet')->middleware('auth','admin');

