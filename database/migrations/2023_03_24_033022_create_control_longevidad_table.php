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
        Schema::create('control_longevidad', function (Blueprint $table) {
            $table->id();
            $table->integer('id_equipo')->nullable();
            $table->integer('id_longevidad')->nullable();
            $table->integer('id_sucursal');
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
        Schema::dropIfExists('control_longevidad');
    }
};
