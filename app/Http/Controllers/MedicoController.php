<?php
/*--------- Modelos --------*/
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Usuario;
use App\Models\Especialidad;
use App\Models\EspecialidadMedica;
use App\Models\Medico;

/*--------- Fin Modelos --------*/

class MedicoController extends Controller
{
    
    /*-----------  Index  ---------------*/
    public function index(Request $request)
    {   
        $nombres = $request->get('nombres');
        $apellidos = $request->get('apellidos');
        $numeroDocumento = $request->get('documento');

        if($request->has("documento")) {
            $usuarios = Usuario::orderBy('apellidos', 'ASC')
                ->NumeroDocumento($numeroDocumento);
            return view('registroMedico.index', compact('usuarios'));
        }

        if($request->has("nombres")) {
            $usuarios = Usuario::orderBy('apellidos', 'ASC')
                ->Nombres($nombres);
            return view('registroMedico.index', compact('usuarios'));

        }
        if($request->has("apellidos")) {
            $usuarios = Usuario::orderBy('apellidos', 'ASC')
                ->Apellidos($apellidos);
            return view('registroMedico.index', compact('usuarios'));
        }

        return view('registroMedico.index');
    }
    /*-----------  Fin Index Buscador ---------------*/
   public function create()
    {
        //
    }

    /*----------- Registro Medicos ------------*/
    public function store(Request $request) {
        
        $request->validate([
            'medicoEstado' => 'required',
            'medicoFechaAfiliacion' => 'required',
            'medicoFechaRetiro' => 'required',
            'id_usuario' => 'required'
        ]);

        $medicos = new Medico();
        $medicos->medicoEstado = $request->medicoEstado;
        $medicos->medicoFechaAfiliacion = $request->medicoFechaAfiliacion;
        $medicos->medicoFechaRetiro = $request->medicoFechaRetiro;
        $medicos->id_usuario = $request->id_usuario;
        $medicos->save();

       return redirect()->route('registroMedico.index')->with('success','Medico Registrado Correctamente');
        

        /*----------- Fin Registro Medicos ------------*/
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
        $usuario = Usuario::find($id);
        return view('registroMedico.index',['usuario'=>$usuario]);
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
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function buscarUsuario(Request $request)
    {
        $usuario = Usuario::find($request->search);
        return view('registroMedico.index',['usuario'=> $usuario]);
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


    public function registroUsuariosearch(Request $request){
        print "Entre al metodo";
    }


}
