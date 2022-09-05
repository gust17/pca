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
        Schema::create('ocorrencias_obitos', function (Blueprint $table) {
            $table->id();
            $table->string('local');
            $table->string('estabelecimento')->nullable();
            $table->string('codigo_cnes')->nullable();
            $table->unsignedBigInteger('endereco_id')->nullable();
            $table->foreign('endereco_id')->references('id')->on('enderecos');
            $table->unsignedBigInteger('periciando_morto_id')->nullable();
            $table->foreign('periciando_morto_id')->references('id')->on('periciandos_mortos')->onDelete('cascade');
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
        Schema::dropIfExists('ocorrencias');
    }
};
