<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Usuarios;
use App\Models\Tipo_Afiliacion;

class Paciente extends Model
{
    use HasFactory;

    public function usuarios (){
        return $this->hasMany(Sexo::class);
    }

    public function tipo_afiliacion (){
        return $this->hasMany(Tipo_Afiliacion::class);
    }
}
