<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDiagnosticoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('diagnostico', function (Blueprint $table) {
            $table->bigIncrements('id_diagnostico');
            $table->string('tipo',255);
            $table->string('observacion',255)->nullable();
            $table->unsignedInteger('cie10_id');
            $table->foreign('cie10_id', 'fk_diagnostico_cie10')->references('id_cie10')->on('cie10')->onDelete('restrict')->onUpdate('restrict');
            $table->unsignedBigInteger('historia_id');
            $table->foreign('historia_id', 'fk_historia_diagnostico')->references('id_historia')->on('historia')->onDelete('restrict')->onUpdate('restrict');
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
        Schema::dropIfExists('diagnostico');
    }
}
