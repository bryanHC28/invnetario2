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
        Schema::create('reportes', function (Blueprint $table) {
            $table->id();
            $table->integer('id_respuesta');
            $table->string('estatus_supervisor');
            $table->string('estatus_cliente');
            $table->integer('id_sucursal');
            $table->integer('Estado_eliminado');
            $table->integer('id_usuario_receptor')->nullable();
            $table->integer('id_usuario_emisor');

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
        Schema::dropIfExists('reportes');
    }
};
