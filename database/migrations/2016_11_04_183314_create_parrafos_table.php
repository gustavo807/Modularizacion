<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateParrafosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('parrafos', function (Blueprint $table) {
            $table->increments('id');

            $table->integer('modulo_id')->unsigned();
            $table->foreign('modulo_id')
                  ->references('id')->on('modulos')
                  ->onDelete('cascade')->onUpdate('cascade');

            $table->string('parrafo');


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
        Schema::dropIfExists('parrafos');
    }
}
