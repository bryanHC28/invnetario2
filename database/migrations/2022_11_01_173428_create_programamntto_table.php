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
            $table->unsignedBigInteger('id_checklist')->nullable();
$table->unsignedBigInteger('id_subchecklist')->nullable();
$table->integer('status');
$table->integer('periodicidad');
$table->date('ultima_fecha')->nullable();
$table->date('proxima_fecha')->nullable();
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
        Schema::dropIfExists('programamntto');
    }
};
