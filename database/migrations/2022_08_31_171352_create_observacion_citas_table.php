<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateObservacionCitasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('observacion_citas', function (Blueprint $table) {
            $table->bigIncrements('id_observacion');
            $table->longText('observacion_usu')->nullable();
            $table->string('estado')->nullable();
            $table->string('bloqueo')->nullable();
            $table->string('usuario')->nullable();
            $table->string('future1')->nullable();
            $table->string('future2')->nullable();
            $table->unsignedBigInteger('usuario_id')->nullable();
            $table->foreign('usuario_id', 'fk_obser_usuario')->references('id')->on('usuario')->onDelete('restrict')->onUpdate('restrict');
            $table->unsignedBigInteger('cita_id')->nullable();
            $table->foreign('cita_id', 'fk_obser_cita')->references('id_cita')->on('cita')->onDelete('restrict')->onUpdate('restrict');
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
        Schema::dropIfExists('observacion_citas');
    }
}
