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

// Ruta del API para nuestro ws de gestion del array desde el FrontEnd
// Route::resource('arreglo', 'ArregloController', ['middleware' => 'cors']);

Route::group(['middleware' => 'cors'], function() {
    Route::resource('arreglo', 'ArregloController');
});