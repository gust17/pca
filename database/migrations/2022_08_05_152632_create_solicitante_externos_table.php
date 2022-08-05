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
        Schema::create('solicitantes_externos', function (Blueprint $table) {
            $table->id();
            $table->string('nome');
            $table->string('cpf');
            $table->string('rg');
            $table->date('data_nascimento');
            $table->string('nacionalidade');
            $table->string('instituicao');
            $table->string('area_atuacao');
            $table->string('numero_telefone')->nullable();
            $table->string('numero_celular')->nullable();
            $table->string('email');
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
        Schema::dropIfExists('solicitante_externos');
    }
};
