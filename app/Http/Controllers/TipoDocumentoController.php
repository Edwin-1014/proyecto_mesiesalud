<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Tipo_Documento;

class TipoDocumentoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {
        /*--------- Index Tipo de Documento --------*/

        return view('registroTipoDocumento.index');

        /*--------- Fin Index Tipo de Documento --------*/
    }

    

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
    public function store(Request $request) {
        /*--------- Registro Tipo de Documento --------*/
        $request->validate([
            'tipo_documento' => 'required|max:45',            
        ]);

        $tipodocumento = new tipo_documento();
        $tipodocumento->tipo_documento = $request->tipo_documento;
        $tipodocumento->save();

        return redirect()->route('registroTipoDocumento.index')->with('success','Tipo de Documento Registrado Correctamente');
        /*--------- Fin Registro Tipo de Documento --------*/
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
