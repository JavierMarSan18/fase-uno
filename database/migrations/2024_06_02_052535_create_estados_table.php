<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('estados', function (Blueprint $table) {
            $table->id('estado_id');
            $table->string('nombre', 45);
            $table->integer('orden');
            $table->integer('gc_record')->nullable();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('estados');
    }
};
