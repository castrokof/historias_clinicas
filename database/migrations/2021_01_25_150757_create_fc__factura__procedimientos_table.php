<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFcFacturaProcedimientosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('fc__factura__procedimientos', function (Blueprint $table) {
            $table->bigIncrements('id_fc_factura_procedimientos');
            $table->string('cod_documentos',10); //Este es el codigo de la factura
            $table->string('numero_factura',100);//Este es el consecutivo de la factura
            $table->string('cod_cups',45);
            $table->string('cod_alterno',45)->nullable();
            $table->dateTime('fechahora');
            $table->string('codigo_cie10',45);
            $table->string('tipo_diagnostico',45);// El mismo que se ingresa en la tabla diagnostico
            $table->string('cantidad',45);
            $table->string('unitario',45);
            $table->string('total',45);
            $table->string('pagado',45);//valor del copago o cuota moderadora
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
        Schema::dropIfExists('fc__factura__procedimientos');
    }
}
