<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEmpresasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('empresas', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nombre');
            $table->string('email')->unique();
            $table->string('password');
            $table->string('direccion');
            $table->timestamps();

            $table->integer('rol_id')->unsigned();
            $table->foreign('rol_id')
                  ->references('id')->on('roles')
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
        Schema::dropIfExists('empresas');
    }
}
