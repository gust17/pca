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
        Schema::create('exames_periciais', function (Blueprint $table) {
            $table->string('id_manual');
            $table->string('tipo');
            $table->unsignedBigInteger('pericia_id')->nullable();
            $table->foreign('pericia_id')->references('id')->on('pericias');
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
        Schema::dropIfExists('exame_pericials');
    }
};