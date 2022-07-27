<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRelServiciovsprocedimientosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rel__serviciovsprocedimientos', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('servicio_id');
            $table->unsignedBigInteger('procedimiento_id');
            $table->foreign('servicio_id', 'fk_servicio_procedimiento')->references('id_servicio')->on('servicios')->onDelete('restrict')->onUpdate('restrict');
            $table->foreign('procedimiento_id', 'fk_procedimiento_servicio')->references('id_cups')->on('def__procedimientos')->onDelete('restrict')->onUpdate('restrict');
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
        Schema::dropIfExists('rel__serviciovsprocedimientos');
    }
}
