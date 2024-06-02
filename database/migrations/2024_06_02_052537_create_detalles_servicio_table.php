<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('detalles_servicio', function (Blueprint $table) {
            $table->id('detalle_servicio_id');
            $table->foreignId('servicio_id')->references('servicio_id')->on('servicios');
            $table->foreignId('estado_id')->references('estado_id')->on('estados');
            $table->timestamp('fecha_inicio')->nullable();
            $table->timestamp('fecha_fin')->nullable();
            $table->text('observaciones')->nullable();;
            $table->integer('gc_record')->nullable();
            $table->integer('orden');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('detalles_servicio');
    }
};
