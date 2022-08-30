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
        Schema::create('materiais_pericias', function (Blueprint $table) {
            $table->id();
            $table->string('numero_material');
            $table->string('numero_lacre')->nullable();
            $table->string('categoria_material')->nullable();
            $table->string('tipo_material')->nullable();
            $table->string('outros')->nullable();
            $table->longText('caracteristicas_gerais_material')->nullable();
            $table->float('qtd_material')->nullable();
            $table->string('unidade_medida')->nullable();
            $table->unsignedBigInteger('protocolo_pericia_id')->nullable();
            $table->foreign('protocolo_pericia_id')->references('id')->on('protocolos_pericias')->onDelete('cascade');
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
        Schema::dropIfExists('material_pericias');
    }
};
