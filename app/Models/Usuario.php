<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Sexo;
use App\Models\Tipo_documento;

class Usuario extends Model
{
    use HasFactory;

    public function sexo (){
        return $this->hasMany(Sexo::class);
    }

    public function tipo_documento (){
        return $this->hasMany(Tipo_documento::class);
    }

    ///// Query Scope /////

    public function scopeNombres($query, $nombre){
        if(isset($nombre)){
            return $query->select("usuarios.id as idUsuario","usuarios.*","sexos.*","tipo__documentos.*")->join("tipo_documentos", 'tipo_documentos.id', "=", "usuarios.id_tipo_documento")->join("sexos", "usuarios.id_sexo", "=", "sexos.id")->where('nombres', 'LIKE', "%$nombre%")->get();
        }
    }


    public function scopeApellidos($query, $apellido){
        if(isset($apellido)){
            return $query->select("usuarios.id as idUsuario","usuarios.*","sexos.*","tipo_documentos.*")->join("tipo_documentos", 'tipo_documentos.id', "=", "usuarios.id_tipo_documento")->join("sexos", "usuarios.id_sexo", "=", "sexos.id")->where('apellidos', 'LIKE', "%$apellido%")->get();
        }
    }

    public function scopeNumeroDocumento($query, $numeroDocumento){
        if(isset($numeroDocumento)){
            return $query->select("usuarios.id as idUsuario","usuarios.*","sexos.*","tipo_documentos.*")->join("tipo_documentos", 'tipo_documentos.id', "=", "usuarios.id_tipo_documento")->join("sexos", "usuarios.id_sexo", "=", "sexos.id")->where('numero_documento', '=', $numeroDocumento)->get();
        }
    }

}
