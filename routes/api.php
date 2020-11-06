<?php

use Illuminate\Http\Request;

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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

/** Listado de API */
// todas los inmuebles destacados
Route::get('/destacadas', 'APIController@index')->name('destacados.index');

//todos los tipos de inmuebles
Route::get('/types', 'APIController@types')->name('types');
//listar un tipo de inmueble
Route::get('/types/{type_property}', 'APIController@type')->name('type_property');