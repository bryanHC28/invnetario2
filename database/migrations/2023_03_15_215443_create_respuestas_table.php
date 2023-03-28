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
        Schema::create('respuestas', function (Blueprint $table) {
            $table->id();
            $table->string('id_contesto');
            $table->string('id_controlmanto');
            $table->string('id_sucursal');
            $table->json('respuestas');
            $table->json('columnas');
            $table->json('columnas_fotos')->nullable();
            $table->json('fotos')->nullable();
            $table->string('observaciones')->nullable();;
            $table->json('comentarios')->nullable();
            $table->integer('Estado_eliminado');
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
        Schema::dropIfExists('respuestas');
    }
};
