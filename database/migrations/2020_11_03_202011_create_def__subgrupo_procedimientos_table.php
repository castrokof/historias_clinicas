<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDefSubgrupoProcedimientosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('def__subgrupo_procedimientos', function (Blueprint $table) {
            $table->bigIncrements('id_subgrupo');
            $table->string('codigo_sub')->unique(); //codigo subgrupo
            $table->unsignedBigInteger('grupo_id'); //grupo
            $table->string('nombre_subgrupo',255);
            $table->foreign('grupo_id', 'fk_subgrupo_grupo')->references('id_grupo')->on('def__grupo_procedimientos')->onDelete('restrict')->onUpdate('restrict');
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
        Schema::dropIfExists('def__subgrupo_procedimientos');
    }
}
