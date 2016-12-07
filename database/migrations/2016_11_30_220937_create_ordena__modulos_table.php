<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOrdenaModulosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ordena_modulos', function (Blueprint $table) {
            $table->integer('modulo_id')->unsigned();
            $table->foreign('modulo_id')
                  ->references('id')->on('modulos')
                  ->onDelete('cascade')->onUpdate('cascade');

            $table->string('orden');
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
        Schema::dropIfExists('ordena_modulos');
    }
}
