<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRelContratovsserviciosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rel__contratovsservicios', function (Blueprint $table) {
            $table->bigIncrements('id_contratovsservicios');
            $table->unsignedBigInteger('contrato_id');
            $table->unsignedBigInteger('servicio_id');
            $table->foreign('contrato_id', 'fk_contrato_servicio')->references('id_contrato')->on('def__contratos')->onDelete('restrict')->onUpdate('restrict');
            $table->foreign('servicio_id', 'fk_servicio_contrato')->references('id_servicio')->on('servicios')->onDelete('restrict')->onUpdate('restrict');
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
        Schema::dropIfExists('rel__contratovsservicios');
    }
}
