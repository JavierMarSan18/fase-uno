<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('servicios', function (Blueprint $table) {
            $table->id('servicio_id');
            $table->foreignId('cliente_id')->references('cliente_id')->on('clientes');
            $table->foreignId('tecnico_id')->references('tecnico_id')->on('tecnicos');
            $table->foreignId('equipo_id')->references('equipo_id')->on('equipos');
            $table->foreignId('estado_id')->references('estado_id')->on('estados');
            $table->text('diagnostico');
            $table->text('solucion');
            $table->timestamp('fecha_inicio');
            $table->timestamp('fecha_fin')->nullable();
            $table->integer('gc_record');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('servicios');
    }
};
