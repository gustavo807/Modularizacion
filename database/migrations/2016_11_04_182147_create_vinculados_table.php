<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateVinculadosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('vinculados', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nombre');
            $table->string('email')->unique();
            $table->string('password');
            $table->string('descripcion');
            $table->string('website');
            $table->string('video');
            $table->string('contacto_nombre');
            $table->string('contacto_email');
            $table->string('contacto_telefono');
            $table->string('direccion');
            $table->timestamps();
            $table->softDeletes();

            $table->integer('user_id')->unsigned();
            $table->foreign('user_id')
                  ->references('id')->on('users')
                  ->onDelete('cascade')->onUpdate('cascade');

            $table->integer('ciudad_id')->unsigned();
            $table->foreign('ciudad_id')
                  ->references('id')->on('ciudades')
                  ->onDelete('cascade')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('vinculados');
    }
}
