<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('equipos', function (Blueprint $table) {
            $table->id('equipo_id');
            $table->foreignId('marca_id')->references('marca_id')->on('marcas');
            $table->foreignId('tipo_equipo_id')->references('tipo_equipo_id')->on('tipos_equipo');
            $table->string('modelo', 100);
            $table->integer('gc_record');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('equipos');
    }
};
