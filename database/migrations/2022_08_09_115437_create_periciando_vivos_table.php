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
        Schema::create('periciandos_vivos', function (Blueprint $table) {
            $table->id();
            $table->string('cartao_sus')->nullable();
            $table->string('naturalidade');
            $table->string('nome');
            $table->string('nome_pai')->nullable();
            $table->string('nome_mae');
            $table->date('data_nascimento');
            $table->date('hora_nascimento')->nullable();
            $table->string('idade');
            $table->string('sexo');
            $table->string('cpf');
            $table->string('rg');
            $table->string('cor');
            $table->string('tipo_sanguineo');
            $table->string('altura');
            $table->string('biotipo');
            $table->string('cor_olho');
            $table->string('cor_cabelo');
            $table->string('tipo_cabelo');
            $table->longText('marca_cicatriz');
            $table->string('estado_civil');
            $table->string('escolaridade')->nullable();
            $table->string('ocupacao')->nullable();
            $table->string('codigo_cbo')->nullable();
            $table->string('foto')->nullable();
            $table->json('documentacao')->nullable();
            $table->unsignedBigInteger('endereco_id')->nullable();
            $table->foreign('endereco_id')->references('id')->on('enderecos');
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
        Schema::dropIfExists('periciando_vivos');
    }
};
