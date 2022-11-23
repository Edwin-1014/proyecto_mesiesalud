<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Usuario;
use App\Models\Tipo_afiliacion;
use App\Models\Paciente;


class ConsultPacienteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $texto = trim($request->get('texto'));
        $usuarios = Usuario::all();
        $tipoafiliacion = Tipo_afiliacion::all();
        $pacientes = DB::table('pacienteusuario_vista')
            ->where('apellidos','LIKE', '%'.$texto.'%')
            ->orWhere('numero_documento','LIKE', '%'.$texto.'%')
            ->orWhere('nombres','LIKE', '%'.$texto.'%')
            ->orderBy('apellidos','asc')
            ->paginate(3);
        return view('consultaPaciente.index', compact('pacientes','texto','tipoafiliacion','usuarios'));
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {   
        $paciente = Paciente::find($id);
        $usuario = Usuario::find($paciente->id_usuario);
        $tipos = Tipo_afiliacion::all();
        $tipo = Tipo_afiliacion::find($paciente->id_tipo_afiliacion);
        //dd($tipo);
        return view('consultaPaciente.show',['pacientes' => $paciente,'usuario'=>$usuario, 'tipos'=>$tipos, 'tipo'=>$tipo]);
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
        $pacientes = Paciente::find($id);
        $request->validate([
            'pacienteFechaAfiliacion' => 'required',
            'pacienteEstado' => 'required',         
            'id_tipo_afiliacion' => 'required'
        ]);

        
        $pacientes->pacienteFechaAfiliacion = $request->pacienteFechaAfiliacion;
        $pacientes->pacienteEstado = $request->pacienteEstado;       
        $pacientes->id_tipo_afiliacion = $request->id_tipo_afiliacion;
        $pacientes->save();

       return redirect()->route('consultaPaciente.index')->with('success','Paciente Actualizado Correctamente');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $pacientes = Paciente::find($id);
        $pacientes->delete();
            return redirect()->route('consultaPaciente.index')->with('success','Usuario Eliminado');
    }
}
