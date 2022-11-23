<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Usuario;
use App\Models\Tipo_documento;
use App\Models\Sexo;


class ConsultUsuarioController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {        
        $texto = trim($request->get('texto'));
        $sexos = Sexo::all();
        $tipodocumentos = Tipo_Documento::all();
        $usuarios = DB::table('usuarios')
            ->join('sexos', 'usuarios.id_sexo', '=', 'sexos.id')
            ->join('tipo_documentos', 'tipo_documentos.id', '=', 'usuarios.id_tipo_documento')
            ->select('usuarios.id','nombres', 'apellidos','fechanacimiento', 'rh', 'telefono','correo','direccion','numero_documento','tipo_documento','sexo')
            ->where('apellidos','LIKE', '%'.$texto.'%')
            ->orWhere('numero_documento','LIKE', '%'.$texto.'%')
            ->orWhere('nombres','LIKE', '%'.$texto.'%')
            ->orderBy('apellidos','asc')
            ->paginate(5);
        return view('consultaUsuario.index', compact('usuarios','texto','sexos','tipodocumentos'));
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
        $tipodocumentos = Tipo_documento::all();
        $sexos = Sexo::all();
        $usuarios = Usuario::find($id);
        $rh = ['A+','A-','B+','B-','AB+','AB-','O+','O-'];
        return view('consultaUsuario.show',['usuario' => $usuarios, 'tipodocumentos'=> $tipodocumentos, 'sexos' => $sexos, 'rh' => $rh]);
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
        $usuarios = Usuario::find($id);
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

        $usuarios->nombres = $request->nombres;
        $usuarios->apellidos = $request->apellidos;
        $usuarios->fechanacimiento = $request->fechanacimiento;
        $usuarios->rh = $request->rh;
        $usuarios->telefono = $request->telefono;
        $usuarios->correo = $request->correo;
        $usuarios->direccion = $request->direccion;
        $usuarios->numero_documento = $request->numero_documento;
        $usuarios->id_tipo_documento = $request->id_tipo_documento;
        $usuarios->id_sexo = $request->id_sexo;
        $usuarios->save();

        return redirect()->route('consultaUsuario.index')->with('success','Usuario Actualizado Correctamente');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
   public function destroy($id)
    {
        $usuarios = Usuario::find($id);
        $usuarios->delete();
            return redirect()->route('consultaUsuario.index')->with('success','Usuario Eliminado');
       
        

        
    }
}
