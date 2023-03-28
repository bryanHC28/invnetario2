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
        Schema::create('longevidad', function (Blueprint $table) {
            $table->id();
            $table->date('fecha_ingreso');
            $table->date('fecha_vencimiento');
            $table->integer('costo_unitario');
            $table->string('descripcion', 100)->nullable();
            $table->date('garantia')->nullable();
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
        Schema::dropIfExists('longevidad');
    }
};
