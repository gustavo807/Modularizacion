<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUserClavesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_claves', function (Blueprint $table) {
          $table->integer('user_id')->unsigned();
          $table->foreign('user_id')
                ->references('id')->on('users')
                ->onDelete('cascade')->onUpdate('cascade');

          $table->integer('clave_id')->unsigned();
          $table->foreign('clave_id')
                ->references('id')->on('claves')
                ->onDelete('cascade')->onUpdate('cascade');

          $table->string('valor');
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
        Schema::dropIfExists('user_claves');
    }
}
