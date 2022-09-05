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
        Schema::create('filho_mae_periciando_mortos', function (Blueprint $table) {
            $table->id();
            $table->boolean('nascido_vivo')->default(false);
            $table->boolean('perda_fetal')->default(false);
            $table->integer('semanas_gestacao')->nullable();
            $table->string('tipo_parto')->nullable();
            $table->string('morte_parto')->nullable();
            $table->string('peso_nascimento')->nullable();
            $table->string('certidao_nascimento')->nullable();
            $table->unsignedBigInteger('mae_periciando_morto_id')->nullable();
            $table->foreign('mae_periciando_morto_id')->references('id')->on('maes_periciandos_mortos')->onDelete('cascade');
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
        Schema::dropIfExists('filho_mae_periciando_mortos');
    }
};
