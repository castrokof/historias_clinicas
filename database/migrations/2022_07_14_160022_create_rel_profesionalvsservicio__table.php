<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRelProfesionalvsservicioTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rel__profesionalvsservicio', function (Blueprint $table) {
            $table->bigIncrements('id_profesionalvsservicio');
            //$table->string('codigo',10);
            $table->unsignedBigInteger('servicio_id');
            $table->unsignedBigInteger('profesional_id');
            $table->foreign('servicio_id', 'fk_servicio_prof')->references('id_servicio')->on('servicios')->onDelete('restrict')->onUpdate('restrict');
            $table->foreign('profesional_id', 'fk_prof_servicio')->references('id_profesional')->on('def__profesionales')->onDelete('restrict')->onUpdate('restrict');
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
        Schema::dropIfExists('rel__profesionalvsservicio');
    }
}
