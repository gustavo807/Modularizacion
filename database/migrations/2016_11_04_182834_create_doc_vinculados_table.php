<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDocVinculadosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('doc_vinculados', function (Blueprint $table) {
            $table->increments('id');
            $table->string('documento');
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
        Schema::dropIfExists('doc_vinculados');
    }
}
