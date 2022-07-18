<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRelProfesionalvsprocedimientosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rel__profesionalvsprocedimientos', function (Blueprint $table) {
            $table->bigIncrements('id_profesionalvsprocedimientos');
            //$table->string('codigo',10);
            $table->unsignedBigInteger('procedimiento_id');
            $table->unsignedBigInteger('profesional_id');
            $table->foreign('procedimiento_id', 'fk_procedimiento_prof')->references('id_cups')->on('def__procedimientos')->onDelete('restrict')->onUpdate('restrict');
            $table->foreign('profesional_id', 'fk_prof_medicamento')->references('id_profesional')->on('def__profesionales')->onDelete('restrict')->onUpdate('restrict');
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
        Schema::dropIfExists('rel__profesionalvsprocedimientos');
    }
}
