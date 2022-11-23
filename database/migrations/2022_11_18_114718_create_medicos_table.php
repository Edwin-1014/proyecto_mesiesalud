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
            $table->bigInteger('id_usuario')->unsigned();
            $table
                ->foreign('id_usuario')
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
