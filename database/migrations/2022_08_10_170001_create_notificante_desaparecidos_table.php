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
        Schema::create('notificantes_desaparecidos', function (Blueprint $table) {
            $table->id();
            $table->string('nome');
            $table->string('tipo_documento');
            $table->string('numero_documento');
            $table->string('grau_parentesco');
            $table->string('email');
            $table->string('outro')->nullable();
            $table->string('numero_telefone');
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
        Schema::dropIfExists('notificante_desaparecidos');
    }
};
