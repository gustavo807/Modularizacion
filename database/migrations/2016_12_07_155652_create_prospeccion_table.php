<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProspeccionTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('prospeccion', function (Blueprint $table) {
            $table->increments('id');
            $table->string('razon_social', 100)->nullable();
            $table->string('rfc', 100);
            $table->string('nombre_comercial', 100)->nullable();
            $table->string('pagina_web', 50)->nullable();
            $table->string('giro', 10)->nullable();
            $table->string('empleados_imss', 8)->nullable();
            $table->string('facturacion_anterior', 20)->nullable();
            $table->string('tamano_empresa', 10)->nullable();
            $table->date('inicio_ops')->nullable();
            $table->string('sector', 50)->nullable();
            $table->string('prod_servs', 2000)->nullable();
            $table->string('mat_primas', 2000)->nullable();
            $table->string('procesos', 2000)->nullable();
            $table->string('maquinaria', 2000)->nullable();
            $table->string('software', 2000)->nullable();
            $table->string('certificaciones', 2000)->nullable();
            $table->string('clientes', 2000)->nullable();
            $table->string('exports', 2000)->nullable();
            $table->string('producto', 100)->nullable();
            $table->string('tier_num', 1)->nullable();
            $table->string('tier_prod', 50)->nullable();
            $table->string('subsist', 80)->nullable();
            $table->string('nombre_titular', 80)->nullable();
            $table->string('puesto_titular', 50)->nullable();
            $table->string('tel_titular', 15)->nullable();
            $table->string('email_titular', 50)->nullable();
            $table->string('nombre_rep', 80)->nullable();
            $table->string('rfc_rep', 50)->nullable();
            $table->string('curp_rep', 50)->nullable();
            $table->string('tel_rep', 15)->nullable();
            $table->string('email_rep', 50)->nullable();
            $table->string('nombre_contacto', 80)->nullable();
            $table->string('puesto_contacto', 50)->nullable();
            $table->string('tel_contacto', 15)->nullable();
            $table->string('email_contacto', 50)->nullable();
            $table->string('calle_comercial', 50)->nullable();
            $table->string('num_ext_comercial', 10)->nullable();
            $table->string('num_int_comercial', 10)->nullable();
            $table->string('colonia_comercial', 50)->nullable();
            $table->string('cp_comercial', 10)->nullable();
            $table->string('estado_comercial', 50)->nullable();
            $table->string('ciudad_comercial', 50)->nullable();
            $table->string('calle_fiscal', 50)->nullable();
            $table->string('num_ext_fiscal', 10)->nullable();
            $table->string('num_int_fiscal', 10)->nullable();
            $table->string('colonia_fiscal', 50)->nullable();
            $table->string('cp_fiscal', 10)->nullable();
            $table->string('estado_fiscal', 50)->nullable();
            $table->string('ciudad_fiscal', 50)->nullable();
            $table->string('desc_necesidades', 2000)->nullable();
            $table->string('monto_inv', 10)->nullable();
            $table->string('fondos', 50)->nullable();
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
        Schema::dropIfExists('prospeccion');
    }
}
