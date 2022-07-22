<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHcEvolucionFormulariosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('hc__evolucion__formularios', function (Blueprint $table){
            $table->bigIncrements('id_ev_formulario');
            $table->unsignedBigInteger('evolucion_id');
            $table->string('cuestionario',10);
            $table->string('pregunta',255);//Este es el codigo o id con el que se crea la pregunta en el el cuestinoario
            $table->string('respuesta',10);//Este es el codigo o id con el que se crea la respueste en el el cuestinoario
            $table->string('detelle_respuesta',255)->nullable();//Algunas respuestas solo son numericas
            $table->foreign('evolucion_id', 'fk_evolucion_formulario')->references('id_evolucion')->on('hc__evolucions')->onDelete('restrict')->onUpdate('restrict');
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
        Schema::dropIfExists('hc__evolucion__formularios');
    }
}
