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
use App\Http\Controllers\ConsultUsuarioController;
use App\Http\Controllers\ConsultPacienteController;
use App\Http\Controllers\FarmacosController;
use App\Http\Controllers\ConsultMedicoController;


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

Route::get('/registros', function () {
    return view('registros/index');
});

Route::get('/consultas', function () {
    return view('consultas/index');
});




Route::resource('/registroUsuario',UsuariosController::class);
Route::get('/registroUsuariosearch', [MedicoController::class, 'registroUsuariosearch']);
Route::resource('registroMedico', MedicoController::class);
Route::resource('registroPaciente', PacienteController::class);
Route::resource('registroEspecialidad', EspecialidadController::class);
Route::resource('registroTipoDocumento', TipoDocumentoController::class);
Route::resource('registroTipoAfiliacion', TipoAfiliacionController::class);
Route::resource('registroFarmacos', FarmacosController::class);

Route::post('consultaUsuario/{id}', [ConsultUsuarioController::class, 'destroy'])->name('consultaUsuario-destroy');
Route::post('consultaUsuario/{id}', [ConsultUsuarioController::class, 'show']);
Route::post('consultaUsuario/{id}', [ConsultUsuarioController::class, 'update']);
Route::resource('consultaUsuario', ConsultUsuarioController::class);

Route::resource('consultaPaciente', ConsultPacienteController::class);
Route::post('consultaPaciente/{id}', [ConsultPacienteController::class, 'destroy']);
Route::post('consultaPaciente/{id}', [ConsultPacienteController::class, 'show']);
Route::post('consultaPaciente/{id}', [ConsultPacienteController::class, 'update']);

Route::resource('consultaMedico', ConsultMedicoController::class);
Route::post('consultaMedico/{id}', [ConsultMedicoController::class, 'destroy']);
Route::post('consultaMedico/{id}', [ConsultMedicoController::class, 'show']);
Route::post('consultaMedico/{id}', [ConsultMedicoController::class, 'update']);

Route::get('/home', [AutoCompleteMedicoController::class, 'index']);
Route::get('autocomplete-search', [AutoCompleteMedicoController::class,'autocompleteSearch']);

