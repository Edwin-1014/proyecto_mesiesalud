<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Usuario;
use App\Models\Paciente;
use App\Models\Tipo_afiliacion;

class PacienteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    /*-----------  Index  ---------------*/
    public function index(Request $request)
    {      

        $nombres = $request->get('nombres');
        $apellidos = $request->get('apellidos');
        $numeroDocumento = $request->get('documento');

        if($request->has("documento")) {
            $usuarios = Usuario::orderBy('apellidos', 'ASC')
                ->NumeroDocumento($numeroDocumento);
                $tipoafiliacion = Tipo_afiliacion::all();
            return view('registroPaciente.index', compact('usuarios','tipoafiliacion'));
        }

        if($request->has("nombres")) {
            $usuarios = Usuario::orderBy('apellidos', 'ASC')
                ->Nombres($nombres);
            return view('registroPaciente.index', compact('usuarios'));

        }
        if($request->has("apellidos")) {
            $usuarios = Usuario::orderBy('apellidos', 'ASC')
                ->Apellidos($apellidos);
            return view('registroPaciente.index', compact('usuarios'));
        }

        return view('registropaciente.index');


        
    }
    /*-----------  Fin Index Buscador ---------------*/

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
    /*----------- Registro Paciente ------------*/
    public function store(Request $request) {
        $request->validate([
            'pacienteFechaAfiliacion' => 'required',
            'pacienteEstado' => 'required',
            'id_usuario' => 'required',
            'id_tipo_afiliacion' => 'required'
        ]);

        $pacientes = new Paciente;
        $pacientes->pacienteFechaAfiliacion = $request->pacienteFechaAfiliacion;
        $pacientes->pacienteEstado = $request->pacienteEstado;
        $pacientes->id_usuario = $request->id_usuario;
        $pacientes->id_tipo_afiliacion = $request->id_tipo_afiliacion;
        $pacientes->save();

       return redirect()->route('consultaPaciente.index')->with('success','Paciente Registrado Correctamente');
        

        /*----------- Fin Registro Paciente ------------*/
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

    public function tipo_afiliacion(Request $request){
        
    }

    
}
