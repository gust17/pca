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
        Schema::create('dados_obitos', function (Blueprint $table) {
            $table->id();
            $table->date('data_entrada_dml');
            $table->time('hora_entrada_dml');
            $table->date('data_obito');
            $table->time('hora_obito');
            $table->string('natureza_obito');
            $table->string('objeto_causa_obito')->nullable();
            $table->boolean('obito_mulher_idade_fertil')->default(false);
            $table->string('obito_mulher_idade_fertil_momento')->nullable();
            $table->boolean('assistencia_durante_doenca')->default(false);
            $table->boolean('diagnostico_confirmado_necropsia')->default(false);
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
        Schema::dropIfExists('dado_obitos');
    }
};
