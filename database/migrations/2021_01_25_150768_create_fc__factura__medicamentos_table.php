<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFcFacturaMedicamentosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('fc__factura__medicamentos', function (Blueprint $table) {
            $table->bigIncrements('id_fc_factura_medicamentos');
            $table->unsignedBigInteger('factura_id'); //Este fk apunta a la tabla factura
            $table->unsignedBigInteger('medicamento_id');
            $table->unsignedBigInteger('cantidad_ordenada');
            $table->unsignedBigInteger('cantidad_entregada');
            $table->unsignedBigInteger('unitario');
            $table->unsignedBigInteger('iva');
            $table->unsignedBigInteger('total_med');
            $table->unsignedBigInteger('pagado')->nullable();
            $table->unsignedBigInteger('sede_id');
            $table->unsignedBigInteger('servicio_id');
            $table->unsignedBigInteger('profesional_id');
            $table->unsignedBigInteger('contrato_id');
            $table->string('CUMS',100)->nullable();
            $table->string('observaciones',255)->nullable();
            $table->foreign('factura_id', 'fk_fac_med_factura')->references('id_factura')->on('fc__facturas')->onDelete('restrict')->onUpdate('restrict');
            $table->foreign('sede_id', 'fk_fac_med_sede')->references('id_sede')->on('def__sedes')->onDelete('restrict')->onUpdate('restrict');
            $table->foreign('servicio_id', 'fk_fac_med_servicio')->references('id_servicio')->on('servicios')->onDelete('restrict')->onUpdate('restrict');
            $table->foreign('profesional_id', 'fk_fac_med_profesional')->references('id_profesional')->on('def__profesionales')->onDelete('restrict')->onUpdate('restrict');
            $table->foreign('contrato_id', 'fk_fac_med_contrato')->references('id_contrato')->on('def__contratos')->onDelete('restrict')->onUpdate('restrict');
            $table->foreign('medicamento_id', 'fk_fac_medicamento')->references('id_medicamento')->on('def__medicamentos_suministros')->onDelete('restrict')->onUpdate('restrict');
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
        Schema::dropIfExists('fc__factura__medicamentos');
    }
}
