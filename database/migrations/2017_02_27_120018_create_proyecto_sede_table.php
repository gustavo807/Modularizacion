<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProyectoSedeTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('proyecto_sede', function (Blueprint $table) {
            $table->increments('id');

            $table->integer('proyecto_id')->unsigned();
            $table->foreign('proyecto_id')
                ->references('id')->on('proyectos')->onDelete('cascade')->onUpdate('cascade');

            $table->integer('sede_id')->unsigned();
            $table->foreign('sede_id')
                ->references('id')->on('sedes')->onDelete('cascade')->onUpdate('cascade');

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
        Schema::dropIfExists('proyecto_sede');
    }
}
