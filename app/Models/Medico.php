<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Usuario;
class Medico extends Model
{
    use HasFactory;

    public function usuarios (){
        return $this->hasMany(Usuarios::class);
    }
}
