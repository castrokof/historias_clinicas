<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRelContratovsprocedimientosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rel__contratovsprocedimientos', function (Blueprint $table) {
            $table->bigIncrements('id_contratovsprocedimiento');
            $table->unsignedBigInteger('contrato_id');
            $table->unsignedBigInteger('procedimiento_id');
            $table->string('valor', 200);
            $table->foreign('contrato_id', 'fk_contrato_procedimiento')->references('id_contrato')->on('def__contratos')->onDelete('restrict')->onUpdate('restrict');
            $table->foreign('procedimiento_id', 'fk_procedimiento_contrato')->references('id_cups')->on('def__procedimientos')->onDelete('restrict')->onUpdate('restrict');
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
        Schema::dropIfExists('rel__contratovsprocedimientos');
    }
}
