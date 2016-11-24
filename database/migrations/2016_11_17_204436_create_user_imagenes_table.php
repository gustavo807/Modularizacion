<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUserImagenesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_imagenes', function (Blueprint $table) {
          $table->integer('user_id')->unsigned();
          $table->foreign('user_id')
                ->references('id')->on('users')
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
        Schema::dropIfExists('user_imagenes');
    }
}
