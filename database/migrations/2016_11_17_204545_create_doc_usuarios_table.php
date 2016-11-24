<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDocUsuariosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('doc_usuarios', function (Blueprint $table) {
          $table->integer('user_id')->unsigned();
          $table->foreign('user_id')
                ->references('id')->on('users')
                ->onDelete('cascade')->onUpdate('cascade');

          $table->integer('documento_id')->unsigned();
          $table->foreign('documento_id')
                ->references('id')->on('documentos')
                ->onDelete('cascade')->onUpdate('cascade');

          $table->string('documento');

          $table->timestamps();
          //$table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('doc_usuarios');
    }
}
