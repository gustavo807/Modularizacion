<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateInvestigadoresTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('investigadores', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nombre');
            $table->string('trayectoria');
            $table->string('foto');
            $table->string('email');
            $table->string('usuario_conacyt');
            $table->string('password_conacyt');
            $table->timestamps();

            $table->integer('vinculado_id')->unsigned();
            $table->foreign('vinculado_id')
                  ->references('id')->on('vinculados')
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
        Schema::dropIfExists('investigadores');
    }
}
