<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateConvoctoriaDirigidoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('convocatoria_dirigido', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('convocatoria_id')->unsigned();
            $table->foreign('convocatoria_id')
                ->references('id')->on('convocatorias')->onDelete('cascade')->onUpdate('cascade');
            $table->integer('dirigido_id')->unsigned();
            $table->foreign('dirigido_id')
                ->references('id')->on('dirigidos')->onDelete('cascade')->onUpdate('cascade');
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
        Schema::dropIfExists('convocatoria_dirigido');
    }
}
