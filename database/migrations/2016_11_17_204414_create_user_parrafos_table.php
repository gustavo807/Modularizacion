<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUserParrafosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_parrafos', function (Blueprint $table) {
          $table->integer('user_id')->unsigned();
          $table->foreign('user_id')
                ->references('id')->on('users')
                ->onDelete('cascade')->onUpdate('cascade');

          $table->integer('parrafo_id')->unsigned();
          $table->foreign('parrafo_id')
                ->references('id')->on('parrafos')
                ->onDelete('cascade')->onUpdate('cascade');


          $table->string('observacion');
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
        Schema::dropIfExists('user_parrafos');
    }
}
