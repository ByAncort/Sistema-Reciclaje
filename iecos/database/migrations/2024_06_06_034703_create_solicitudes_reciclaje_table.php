<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSolicitudesReciclajeTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('solicitudes_reciclaje', function (Blueprint $table) {
            $table->id();
            $table->string('ubicacion');
            $table->integer('kg_aprox');
            $table->unsignedBigInteger('user_id');
            $table->string('estado')->default('pendiente');
            $table->timestamps(); 

            $table->foreign('user_id')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('solicitudes_reciclaje');
    }
}
