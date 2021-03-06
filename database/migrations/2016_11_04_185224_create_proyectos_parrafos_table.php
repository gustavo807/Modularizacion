<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProyectosParrafosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('proyectos_parrafos', function (Blueprint $table) {
            $table->integer('proyecto_id')->unsigned();
            $table->foreign('proyecto_id')
                  ->references('id')->on('proyectos')
                  ->onDelete('cascade')->onUpdate('cascade');

            $table->integer('parrafo_id')->unsigned();
            $table->foreign('parrafo_id')
                  ->references('id')->on('parrafos')
                  ->onDelete('cascade')->onUpdate('cascade');

            $table->string('observacion');
            $table->string('propietario');

            $table->timestamps();
            $table->softDeletes();


        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('proyectos_parrafos');
    }
}
