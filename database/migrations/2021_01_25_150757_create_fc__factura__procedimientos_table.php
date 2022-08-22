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
            $table->unsignedBigInteger('factura_id'); //Este fk apunta a la tabla factura
            $table->unsignedBigInteger('procedimiento_id');
            $table->string('codigo_cie10',45)->nullable();
            $table->string('tipo_diagnostico',45)->nullable();// El mismo que se ingresa en la tabla diagnostico
            $table->unsignedBigInteger('cantidad');
            $table->unsignedBigInteger('unitario');
            $table->unsignedBigInteger('total_pro');
            $table->unsignedBigInteger('pagado')->nullable();//valor del copago o cuota moderadora
            $table->unsignedBigInteger('sede_id');
            $table->unsignedBigInteger('servicio_id');
            $table->unsignedBigInteger('profesional_id');
            $table->unsignedBigInteger('contrato_id');
            $table->string('observaciones',255)->nullable();
            $table->foreign('factura_id', 'fk_fac_factura')->references('id_factura')->on('fc__facturas')->onDelete('restrict')->onUpdate('restrict');
            $table->foreign('sede_id', 'fk_fac_sede')->references('id_sede')->on('def__sedes')->onDelete('restrict')->onUpdate('restrict');
            $table->foreign('servicio_id', 'fk_fac_servicio')->references('id_servicio')->on('servicios')->onDelete('restrict')->onUpdate('restrict');
            $table->foreign('profesional_id', 'fk_fac_profesional')->references('id_profesional')->on('def__profesionales')->onDelete('restrict')->onUpdate('restrict');
            $table->foreign('contrato_id', 'fk_fac_contrato')->references('id_contrato')->on('def__contratos')->onDelete('restrict')->onUpdate('restrict');
            $table->foreign('procedimiento_id', 'fk_fac_procedimiento')->references('id_cups')->on('def__procedimientos')->onDelete('restrict')->onUpdate('restrict');
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
