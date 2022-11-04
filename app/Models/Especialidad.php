<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Especialidad extends Model
{
    use HasFactory;

    public function medico (){
        return $this->belongsToMany(Medico::class, 'especialidad_medicas','especialidad_id_especialidad','medico_id_medico');
    }
}
