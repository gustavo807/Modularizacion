<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateResearchersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('researchers', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nombre');
            $table->string('apellidopaterno');
            $table->string('apellidomaterno');
            $table->string('sexo');
            $table->string('usuarioconacyt');
            $table->string('correo');
            $table->string('telefono');
            $table->string('grado');
            $table->string('campo');
            $table->string('sni');
            $table->string('informacion',6000);
            $table->string('actividades',2000);
            $table->string('entregables',3900);

            $table->integer('sede_id')->unsigned();
            $table->foreign('sede_id')
                ->references('id')->on('sedes')->onDelete('cascade')->onUpdate('cascade');

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
        Schema::dropIfExists('researchers');
    }
}
