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
        Schema::create('programamntto', function (Blueprint $table) {
            $table->id();
            $table->integer('periodicidad');
            $table->integer('id_sucursal');
            $table->date('ultima_fecha');
            $table->date('proxima_fecha');
            $table->integer('Estado_eliminado');
            $table->string('Estado_fecha', 100)->nullable();
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
        Schema::dropIfExists('programamntto');
    }
};
