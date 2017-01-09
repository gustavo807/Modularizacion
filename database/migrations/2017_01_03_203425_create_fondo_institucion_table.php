<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFondoInstitucionTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('fondo_institucion', function (Blueprint $table) {

          $table->integer('fondo_id')->unsigned();
          $table->foreign('fondo_id')
                ->references('id')->on('fondos')
                ->onDelete('cascade')->onUpdate('cascade');

          $table->integer('institucion_id')->unsigned();
          $table->foreign('institucion_id')
                ->references('id')->on('instituciones')
                ->onDelete('cascade')->onUpdate('cascade');


          $table->primary(['fondo_id', 'institucion_id']);

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
        Schema::dropIfExists('fondo_institucion');
    }
}
