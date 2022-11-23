<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Usuario;
use App\Models\Medico;
use App\Models\Tipo_documento;

class ConsultMedicoController extends Controller
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
        $tipodocumentos = Tipo_documento::all();
        $medicos = DB::table('medicousuario_vista')
            ->where('apellidos','LIKE', '%'.$texto.'%')
            ->orWhere('numero_documento','LIKE', '%'.$texto.'%')
            ->orWhere('nombres','LIKE', '%'.$texto.'%')
            ->orderBy('apellidos','asc')
            ->paginate(3);
        return view('consultaMedico.index', compact('medicos','texto','tipodocumentos','usuarios'));
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
        $medicos = Medico::find($id);
        $usuario = Usuario::find($medicos->id_usuario);        
        //dd($tipo);
        return view('consultaMedico.show',['usuario'=>$usuario, 'medicos' => $medicos]);
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
        $medicos = Medico::find($id);
        $request->validate([
            'medicoEstado' => 'required',
            'medicoFechaAfiliacion' => 'required',
            'medicoFechaRetiro' => 'required'
        ]);

        
        $medicos->medicoEstado = $request->medicoEstado;
        $medicos->medicoFechaAfiliacion = $request->medicoFechaAfiliacion;
        $medicos->medicoFechaRetiro = $request->medicoFechaRetiro;
        $medicos->save();

       return redirect()->route('consultaMedico.index')->with('success','Medico Actualizado Correctamente');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $medicos = Medico::find($id);
        $medicos->delete();
            return redirect()->route('consultaMedico.index')->with('success','Medico Eliminado');    }
}
