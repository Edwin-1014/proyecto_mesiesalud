<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UsuariosController;
use App\Http\Controllers\Registrocontroller;
use App\Http\Controllers\MedicoController;
use App\Http\Controllers\PacienteController;
use App\Http\Controllers\AutoCompleteMedicoController;
use App\Http\Controllers\EspecialidadController;
use App\Http\Controllers\TipoDocumentoController;
use App\Http\Controllers\TipoAfiliacionController;

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

Route::get('/consultas', function () {
    return view('consultas/index');
});

Route::get('/registroPaciente', function () {
    return view('registroPaciente/index');
});



Route::resource('/registroUsuario',UsuariosController::class);
Route::get('/registroUsuariosearch', [MedicoController::class, 'registroUsuariosearch']);
Route::resource('registroMedico', MedicoController::class);
Route::resource('registroPaciente', PacienteController::class);
Route::resource('registroEspecialidad', EspecialidadController::class);
Route::resource('registroTipoDocumento', TipoDocumentoController::class);
Route::resource('registroTipoAfiliacion', TipoAfiliacionController::class);


Route::get('/home', [AutoCompleteMedicoController::class, 'index']);
Route::get('autocomplete-search', [AutoCompleteMedicoController::class,'autocompleteSearch']);

