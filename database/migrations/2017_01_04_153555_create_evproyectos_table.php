<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEvproyectosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('evproyectos', function (Blueprint $table) {
            $table->increments('id');

            $table->integer('proyecto_id')->unsigned();
            $table->foreign('proyecto_id')
                  ->references('id')->on('proyectos')
                  ->onDelete('cascade')->onUpdate('cascade');
            
            $table->integer('evaluacion_id')->unsigned();
            $table->foreign('evaluacion_id')
                  ->references('id')->on('evaluacion')
                  ->onDelete('cascade')->onUpdate('cascade');
            
            $table->integer('evariable_id')->unsigned();
            $table->foreign('evariable_id')
                  ->references('id')->on('evariables')
                  ->onDelete('cascade')->onUpdate('cascade');

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
        Schema::dropIfExists('evproyectos');
    }
}
