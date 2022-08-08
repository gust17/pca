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
        Schema::create('periciandos_mortos', function (Blueprint $table) {
            $table->id();
            $table->boolean('identificado');
            $table->date('data_obito');
            $table->string('cartao_sus')->nullable();
            $table->string('naturalidade');
            $table->string('rg');
            $table->string('cpf');
            $table->string('nome');
            $table->string('nome_pai')->nullable();
            $table->string('nome_mae');
            $table->date('data_nascimento');
            $table->string('sexo');
            $table->string('cor');
            $table->string('estado_civil');
            $table->string('escolaridade')->nullable();
            $table->string('ocupacao')->nullable();
            $table->string('codigo_cbo')->nullable();
            $table->string('foto')->nullable();
            $table->unsignedBigInteger('endereco_id')->nullable();
            $table->foreign('endereco_id')->references('id')->on('enderecos');
            $table->unsignedBigInteger('medico_id')->nullable();
            $table->foreign('medico_id')->references('id')->on('medicos');
            $table->unsignedBigInteger('cartorio_id')->nullable();
            $table->foreign('cartorio_id')->references('id')->on('cartorios');
            $table->string('tipo_medico_atestado')->nullable();
            $table->string('cidade')->nullable();
            $table->string('uf')->nullable();
            $table->date('data_atestado')->nullable();
            $table->longText('observacoes')->nullable();
            $table->json('documentacao')->nullable(); // tipo, path
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
        Schema::dropIfExists('periciando_mortos');
    }
};
