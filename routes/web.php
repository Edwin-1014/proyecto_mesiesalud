<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UsuariosController;
use App\Http\Controllers\Registrocontroller;

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

Route::get('/', function () {
    return view('app');
});

Route::get('/', function () {
    return view('index');
});

Route::get('/registroMedico', function () {
    return view('registroMedico/index');
});
Route::get('/registros', function () {
    return view('registros/index');
});

Route::get('/registroPaciente', function () {
    return view('registroPaciente/index');
});

Route::get('/consultas', function () {
    return view('consultas/index');
});


Route::resource('/registroUsuario',UsuariosController::class);


