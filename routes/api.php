<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

//  


Route::group([
    'prefix' => 'auth'
], function () {
    Route::post('login', 'App\Http\Controllers\AuthController@login');

    Route::post('signup', 'App\Http\Controllers\AuthController@signUp');

    Route::group([
      'middleware' => 'auth:api'
    ], function() {
      Route::get('/genHorario/{espacio}/{fecha}', 'App\Http\Controllers\DataProcess@generarCalendario');
      Route::get('/listarHE/{idLoc}', 'App\Http\Controllers\DataProcess@generarEspaciosHorarios');
      Route::post('/reservar', 'App\Http\Controllers\DataProcess@insertReserva');
      Route::post('/cancelR', 'App\Http\Controllers\ReservasController@update');
      Route::get('/listarLoc', 'App\Http\Controllers\LocalizacionesController@index');
      Route::get('/getRes/{idUser}', 'App\Http\Controllers\DataProcess@comprobarReservas');
        Route::get('logout', 'App\Http\Controllers\AuthController@logout');
      
        Route::get('user', 'App\Http\Controllers\AuthController@user');
    });
   
});
