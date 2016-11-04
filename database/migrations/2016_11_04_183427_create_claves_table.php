<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateClavesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('claves', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nombre');
            $table->string('identificador');
            $table->timestamps();

            $table->integer('modulo_id')->unsigned();
            $table->foreign('modulo_id')
                  ->references('id')->on('modulos')
                  ->onDelete('cascade')->onUpdate('cascade');

            $table->integer('clasificacion_id')->unsigned();
            $table->foreign('clasificacion_id')
                  ->references('id')->on('clasificaciones')
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
        Schema::dropIfExists('claves');
    }
}
