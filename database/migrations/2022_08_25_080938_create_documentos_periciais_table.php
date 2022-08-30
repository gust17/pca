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
        Schema::create('documentos_periciais', function (Blueprint $table) {
            $table->id();
            $table->string('tipo_documento');
            $table->string('numero_documento');
            $table->date('data_documento');
            $table->string('documento_referencia');
            $table->longText('teor_documento');
            $table->boolean('reiteracao_documento');
            $table->json('anexos');
            $table->unsignedBigInteger('entidade_externa_id')->nullable();
            $table->foreign('entidade_externa_id')->references('id')->on('entidades_externas');
            $table->unsignedBigInteger('pessoa_solicitante_id')->nullable();
            $table->foreign('pessoa_solicitante_id')->references('id')->on('users');
            $table->unsignedBigInteger('protocolo_pericia_id')->nullable();
            $table->foreign('protocolo_pericia_id')->references('id')->on('protocolos_pericias')->onDelete('cascade');
            $table->unsignedBigInteger('protocolo_pericia_anterior_id')->nullable();
            $table->foreign('protocolo_pericia_anterior_id')->references('id')->on('protocolos_pericias');
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
        Schema::dropIfExists('documentos');
    }
};
