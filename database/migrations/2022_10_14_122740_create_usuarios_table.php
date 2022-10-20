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
        Schema::create('usuarios', function (Blueprint $table) {
            $table->id();
            $table->string('nombres');
            $table->string('apellidos');
            $table->date('fechanacimiento');
            $table->string('rh');
            $table->bigInteger('telefono');
            $table->string('correo');
            $table->string('direccion');
            $table->bigInteger('numero_documento');
            $table->bigInteger('id_tipodocumento')->unsigned();
            $table
                ->foreign('id_tipodocumento')
                ->references('id')
                ->on('tipo__documentos');
            $table->bigInteger('id_sexo')->unsigned();
            $table
                ->foreign('id_sexo')
                ->references('id')
                ->on('sexos');
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
        Schema::dropIfExists('usuarios');
    }
};
