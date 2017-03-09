<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSedesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sedes', function (Blueprint $table) {
            $table->increments('id');
            $table->string('paginaweb');
            $table->string('direccion');
            $table->string('linkgooglemaps');
            $table->string('descripcion',6000);
            $table->string('contacto');
            $table->string('telefono');
            $table->string('correo');

            $table->integer('user_id')->unsigned();
            $table->foreign('user_id')
                ->references('id')->on('users')->onDelete('cascade')->onUpdate('cascade');

            $table->integer('institution_id')->unsigned();
            $table->foreign('institution_id')
                ->references('id')->on('institutions')->onDelete('cascade')->onUpdate('cascade');
            
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
        Schema::dropIfExists('sedes');
    }
}
