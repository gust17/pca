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
        Schema::create('desaparecidos', function (Blueprint $table) {
            $table->id();
            $table->string('nome');
            $table->string('apelido')->nullable();
            $table->string('cpf');
            $table->string('uf');
            $table->string('cidade');
            $table->string('condicao')->nullable();
            $table->json('fotos')->nullable();
            $table->longText('observacoes');
            $table->boolean('encontrado')->default(false);
            $table->unsignedBigInteger('boletim_ocorrencia_id')->nullable();
            $table->foreign('boletim_ocorrencia_id')->references('id')->on('boletins_ocorrencias');
            $table->unsignedBigInteger('notificante_desaparecido_id')->nullable();
            $table->foreign('notificante_desaparecido_id')->references('id')->on('notificantes_desaparecidos');
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
        Schema::dropIfExists('desaparecidos');
    }
};
