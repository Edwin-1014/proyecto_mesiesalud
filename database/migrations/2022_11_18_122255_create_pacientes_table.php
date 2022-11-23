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
        Schema::create('pacientes', function (Blueprint $table) {
            $table->id();
            $table->date('pacienteFechaAfiliacion');
            $table->enum('pacienteEstado', ['Activo', 'Inactivo'])->default('Activo');
            $table->bigInteger('id_usuario')->unsigned();
            $table
                ->foreign('id_usuario')
                ->references('id')
                ->on('usuarios');
            $table->bigInteger('id_tipo_afiliacion')->unsigned();
            $table
                ->foreign('id_tipo_afiliacion')
                ->references('id')
                ->on('tipo_afiliacions');
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
        Schema::dropIfExists('pacientes');
    }
};
