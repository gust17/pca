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
        Schema::create('maes_periciandos_mortos', function (Blueprint $table) {
            $table->id();
            $table->date('data_nascimento');
            $table->string('escolaridade')->nullable();
            $table->string('ocupacao')->nullable();
            $table->string('codigo_cbo')->nullable();
            $table->unsignedBigInteger('periciando_morto_id')->nullable();
            $table->foreign('periciando_morto_id')->references('id')->on('periciandos_mortos');
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
        Schema::dropIfExists('mae_periciando_mortos');
    }
};
