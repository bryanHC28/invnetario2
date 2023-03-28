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
        Schema::create('equipos', function (Blueprint $table) {
            $table->id();
            $table->integer('id_categoriaequipos');
            $table->integer('id_area');
            $table->integer('id_sucursal');
            $table->string('clave', 100)->nullable();
            $table->string('nombre_equipo', 100);
            $table->integer('Estado_eliminado');
            $table->integer('cantidad')->nullable();
            $table->json('descripcion')->nullable();
            $table->string('modelo', 100)->nullable();
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
        Schema::dropIfExists('equipos');
    }
};
