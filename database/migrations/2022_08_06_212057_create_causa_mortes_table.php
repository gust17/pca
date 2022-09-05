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
        Schema::create('causa_mortes', function (Blueprint $table) {
            $table->id();
            $table->string('causador_principal_morte')->nullable();
            $table->longText('estados_morbidos')->nullable();
            $table->longText('motivacao_morte')->nullable();
            $table->time('tempo_doenca_morte')->nullable();
            $table->unsignedBigInteger('dado_obito_id')->nullable();
            $table->foreign('dado_obito_id')->references('id')->on('dados_obitos')->onDelete('cascade');
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
        Schema::dropIfExists('causa_mortes');
    }
};
