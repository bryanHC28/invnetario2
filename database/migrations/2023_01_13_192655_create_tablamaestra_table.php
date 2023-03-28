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
        Schema::create('tablamaestra', function (Blueprint $table) {

            $table->string('Equipo')->nullable();
            $table->string('Categoria');
            $table->string('Nombre')->nullable();
            $table->string('Area');
            $table->string('SigMnto')->nullable();
            $table->integer('Id_checklist')->nullable();
            $table->string('Modelo')->nullable();
            $table->string('Clave')->nullable();
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
        Schema::dropIfExists('tablamaestra');
    }
};
