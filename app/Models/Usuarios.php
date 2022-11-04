<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Sexo;
use App\Models\Tipo_Documento;

class Usuarios extends Model
{
    use HasFactory;

    public function sexo (){
        return $this->hasMany(Sexo::class);
    }

    public function tipo_documento (){
        return $this->hasMany(Tipo_Documento::class);
    }

    ///// Query Scope /////

    public function scopeNombres($query, $nombre){
        if(isset($nombre)){
            return $query->select("usuarios.id as idUsuario","usuarios.*","sexos.*","tipo__documentos.*")->join("tipo__documentos", 'tipo__documentos.id', "=", "usuarios.id_tipodocumento")->join("sexos", "usuarios.id_sexo", "=", "sexos.id")->where('nombres', 'LIKE', "%$nombre%")->get();
        }
    }


    public function scopeApellidos($query, $apellido){
        if(isset($apellido)){
            return $query->select("usuarios.id as idUsuario","usuarios.*","sexos.*","tipo__documentos.*")->join("tipo__documentos", 'tipo__documentos.id', "=", "usuarios.id_tipodocumento")->join("sexos", "usuarios.id_sexo", "=", "sexos.id")->where('apellidos', 'LIKE', "%$apellido%")->get();
        }
    }

    public function scopeNumeroDocumento($query, $numeroDocumento){
        if(isset($numeroDocumento)){
            return $query->select("usuarios.id as idUsuario","usuarios.*","sexos.*","tipo__documentos.*")->join("tipo__documentos", 'tipo__documentos.id', "=", "usuarios.id_tipodocumento")->join("sexos", "usuarios.id_sexo", "=", "sexos.id")->where('numero_documento', '=', $numeroDocumento)->get();
        }
    }

}
