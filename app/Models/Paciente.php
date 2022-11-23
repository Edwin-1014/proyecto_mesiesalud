<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Usuario;
use App\Models\Tipo_afiliacion;
class Paciente extends Model
{
    use HasFactory;

     public function usuarios (){
        return $this->hasMany(Sexo::class);
    }

    public function tipo_afiliacion (){
        return $this->hasMany(Tipo_afiliacion::class);
    }
}
