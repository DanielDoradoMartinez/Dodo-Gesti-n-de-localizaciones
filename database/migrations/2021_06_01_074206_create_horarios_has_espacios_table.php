<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHorariosHasEspaciosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('horarios_has_espacios', function (Blueprint $table) {
            $table->id();
            $table->integer('idEspacios')->unsigned();
            $table->foreign('idEspacios')->references('id')->on('espacios');
            $table->integer('idHorarios')->unsigned();
            $table->foreign('idHorarios')->references('id')->on('horarios');
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
        Schema::dropIfExists('horarios_has_espacios');
    }
}
