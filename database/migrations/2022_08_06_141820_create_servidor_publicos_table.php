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
        Schema::create('servidores_publicos', function (Blueprint $table) {
            $table->id();
            $table->string('nome');
            $table->string('matricula');
            $table->string('rg');
            $table->string('cpf');
            $table->date('data_nascimento');
            $table->string('orientacao_sexual');
            $table->string('cor');
            $table->string('nacionalidade');
            $table->string('naturalidade');
            $table->string('estado_civil');
            $table->string('lotacao');
            $table->string('grupo_trabalho');
            $table->string('area_atuacao');
            $table->string('formacao_profissional');
            $table->string('numero_telefone')->nullable();
            $table->string('numero_celular')->nullable();
            $table->string('foto')->nullable();
            $table->string('email');
            $table->json('documentacao')->nullable(); // tipo, path
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
        Schema::dropIfExists('servidor_publicos');
    }
};
