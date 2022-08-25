<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('protocolos_pericias', function (Blueprint $table) {
            $table->id();
            $table->string('tipo_pericia');
            $table->string('numero_protocolo');
            $table->date('data_protocolo');
            $table->time('hora_protocolo');
            $table->unsignedBigInteger('usuario_receptor_id')->nullable();
            $table->foreign('usuario_receptor_id')->references('id')->on('users');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('protocolos');
    }
};
