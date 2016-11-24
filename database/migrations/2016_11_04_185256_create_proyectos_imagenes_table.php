<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProyectosImagenesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('proyectos_imagenes', function (Blueprint $table) {
            $table->integer('proyecto_id')->unsigned();
            $table->foreign('proyecto_id')
                  ->references('id')->on('proyectos')
                  ->onDelete('cascade')->onUpdate('cascade');

            $table->integer('imagen_id')->unsigned();
            $table->foreign('imagen_id')
                  ->references('id')->on('imagenes')
                  ->onDelete('cascade')->onUpdate('cascade');

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
        Schema::dropIfExists('proyectos_imagenes');
    }
}
