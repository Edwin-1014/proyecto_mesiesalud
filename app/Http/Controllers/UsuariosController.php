<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Sexo;
use App\Models\Tipo_Documento;
use App\Models\Usuario;

class UsuariosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $sexos = Sexo::all();
        $tipodocumentos = Tipo_Documento::all();
        $usuarios = Usuario::all();
        return view('registroUsuario.index', ['sexos' => $sexos, 'tipodocumentos' => $tipodocumentos]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'nombres' => 'required|max:100',
            'apellidos' => 'required|max:100',
            'fechanacimiento' => 'required',
            'rh' => 'required|max:3',
            'telefono' => 'required|max:15',
            'correo' => 'required|max:45',
            'direccion' => 'required|max:45',
            'numero_documento' => 'required|max:100',
            'id_tipo_documento' => 'required',
            'id_sexo' => 'required'
        ]);

        $usuario = new Usuario();
        $usuario->nombres = $request->nombres;
        $usuario->apellidos = $request->apellidos;
        $usuario->fechanacimiento = $request->fechanacimiento;
        $usuario->rh = $request->rh;
        $usuario->telefono = $request->telefono;
        $usuario->correo = $request->correo;
        $usuario->direccion = $request->direccion;
        $usuario->numero_documento = $request->numero_documento;
        $usuario->id_tipo_documento = $request->id_tipo_documento;
        $usuario->id_sexo = $request->id_sexo;
        $usuario->save();

        return redirect()->route('registroUsuario.index')->with('success','Usuario Registrado Correctamente');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
