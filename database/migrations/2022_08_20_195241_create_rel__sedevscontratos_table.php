<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRelSedevscontratosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rel__sedevscontratos', function (Blueprint $table) {
            $table->bigIncrements('id_sedevsprofesionals');
            $table->unsignedBigInteger('sede_id');
            $table->unsignedBigInteger('contrato_id');
            $table->foreign('sede_id', 'fk_sede_contrato')->references('id_sede')->on('def__sedes')->onDelete('restrict')->onUpdate('restrict');
            $table->foreign('contrato_id', 'fk_contrato_sede')->references('id_contrato')->on('def__contratos')->onDelete('restrict')->onUpdate('restrict');
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
        Schema::dropIfExists('rel__sedevscontratos');
    }
}
