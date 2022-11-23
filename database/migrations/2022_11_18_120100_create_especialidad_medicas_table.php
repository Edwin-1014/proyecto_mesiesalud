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
        Schema::create('especialidad_medicas', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('id_medico')->unsigned();
            $table
                ->foreign('id_medico')
                ->references('id')
                ->on('medicos');
            $table->bigInteger('id_especialidad')->unsigned();
            $table
                ->foreign('id_especialidad')
                ->references('id')
                ->on('especialidads');
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
        Schema::dropIfExists('especialidad_medicas');
    }
};
