<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProyectomoduloTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('proyecto_modulo', function (Blueprint $table) {
          $table->integer('proyecto_id')->unsigned();
          $table->foreign('proyecto_id')
                ->references('id')->on('proyectos')
                ->onDelete('cascade')->onUpdate('cascade');

          $table->integer('modulo_id')->unsigned();
          $table->foreign('modulo_id')
                ->references('id')->on('modulos')
                ->onDelete('cascade')->onUpdate('cascade');

          $table->string('propietario');

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
        Schema::dropIfExists('proyecto_modulo');
    }
}
