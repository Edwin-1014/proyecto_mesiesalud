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
}
