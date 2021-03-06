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

Route::get('/', 'FrontController@index');
Route::get('/show/{event}', 'FrontController@show');
Route::get('/showEvents', 'FrontController@showEvents');

//Auth::routes();

//Excluimos la ruta para registrar
Auth::routes(['register' => false]);

Route::middleware(['auth'])->group(function () {
    // Rutas de eventos que necesitan autenticarse
    Route::resource('events', 'EventController');
    Route::resource('users', 'UserController');
    Route::post('disable/{event}', 'EventController@disable');
});
