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
        Schema::create('preguntas', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_checklist')->nullable();
$table->unsignedBigInteger('id_subchecklist')->nullable();
$table->string('tipo_pregunta',100)->nullable();
$table->string('nombre_pregunta')->nullable();
$table->integer('status');
$table->foreign('id_checklist')->references('id')->on('checklist');
$table->foreign('id_subchecklist')->references('id')->on('subchecklist');
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
        Schema::dropIfExists('preguntas');
    }
};
