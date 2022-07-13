<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePlanfarmacologiconoposTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('planfarmacologiconopos', function (Blueprint $table) {
            $table->bigIncrements('id_planfnopos');
            $table->string('codigo_cums',45)->nullable();
            $table->string('nombre_medto',255)->nullable();
            $table->string('descripcion_medto',255)->nullable();
            $table->string('unidad',45)->nullable();
            $table->string('unidad_referencia',200)->nullable();
            $table->string('via_administracion',100)->nullable();
            $table->string('unidad_medida',45)->nullable();
            $table->string('cantidad',45)->nullable();
            $table->string('forma_farmaceutica',45)->nullable();
            $table->string('dosis',45)->nullable();
            $table->string('frecuencia_hora',45)->nullable();
            $table->string('no_pos',45)->default('NO PBS');
            $table->string('duracion_tmto',45)->nullable();
            $table->string('total_dosis',45)->nullable();
            $table->string('observacion',255)->nullable();
            $table->unsignedInteger('cums_id');
            $table->foreign('cums_id', 'fk_planfarmacologiconopos_cums')->references('id_cums')->on('cums')->onDelete('restrict')->onUpdate('restrict');
            $table->unsignedBigInteger('historia_id');
            $table->foreign('historia_id', 'fk_historia_planfarmacologiconopos')->references('id_historia')->on('historia')->onDelete('restrict')->onUpdate('restrict');
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
        Schema::dropIfExists('planfarmacologiconopos');
    }
}
