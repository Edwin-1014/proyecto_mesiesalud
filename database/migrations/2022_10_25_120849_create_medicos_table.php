<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('medicos', function (Blueprint $table) {
            $table->id();
            $table->enum('medicoEstado', ['Activo','Inactivo'])->default('Activo');
            $table->date('medicoFechaAfiliacion');
            $table->date('medicoFechaRetiro');
            $table->bigInteger('usuario_idusuario')->unsigned();
            $table
                ->foreign('usuario_idusuario')
                ->references('id')
                ->on('usuarios');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('medicos');
    }
};
