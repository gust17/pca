<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * material: boolean default false
    * numero_requisicao : string
    * ano_requisicao : string
    * status_solicitacao : [
    *     RECEBIDA, 
    *     AGUARDANDO MATERIAL,
    *     REJEITADA
    * ]
    * motivo_rejeicao : string
    * numero_protocolo : string
    * dados_usuario_protocolo : ??
    * data_hora_protocolo : datetime
    * numero_caso : string
    * protocolo_id : fk
     */
    public function up()
    {
        Schema::create('documentos_referencias', function (Blueprint $table) {
            $table->id();
            $table->string('numero_requisicao')->nullable();
            $table->string('ano_requisicao')->nullable();
            $table->string('status_solicitacao')->nullable();
            $table->longText('motivo_rejeicao')->nullable();
            $table->string('numero_protocolo')->nullable();
            $table->datetime('data_hora_protocolo')->nullable();
            $table->string('numero_caso')->nullable();
            $table->json('dados_usuario_protocolo')->nullable();
            $table->unsignedBigInteger('protocolo_pericia_id')->nullable();
            $table->foreign('protocolo_pericia_id')->references('id')->on('protocolos_pericias');
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
        Schema::dropIfExists('documentos_referencias');
    }
};
