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
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            // $table->string('name');
            $table->string('email')->unique();
            $table->integer('type')->default(0);
            $table->date('password_validate')->nullable();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->string('photo')->nullable();
            $table->unsignedBigInteger('servidor_publico_id')->nullable();
            $table->foreign('servidor_publico_id')->references('id')->on('servidores_publicos');
            $table->unsignedBigInteger('solicitante_externo_id')->nullable();
            $table->foreign('solicitante_externo_id')->references('id')->on('solicitantes_externos');
            $table->softDeletes();
            $table->rememberToken();
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
        Schema::dropIfExists('users');
    }
};
