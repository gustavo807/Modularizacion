<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePartidaProyectoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('partida_proyecto', function (Blueprint $table) {
            $table->increments('id');

            $table->integer('partida_id')->unsigned();
            $table->foreign('partida_id')
                ->references('id')->on('partidas')->onDelete('cascade')->onUpdate('cascade');

            $table->integer('proyecto_id')->unsigned();
            $table->foreign('proyecto_id')
                ->references('id')->on('proyectos')->onDelete('cascade')->onUpdate('cascade');

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
        Schema::dropIfExists('partida_proyecto');
    }
}
