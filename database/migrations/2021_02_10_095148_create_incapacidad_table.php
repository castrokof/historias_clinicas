<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateIncapacidadTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('incapacidad', function (Blueprint $table) {
            $table->bigIncrements('id_incapacidad');
            $table->date('fecha_ini_inc');
            $table->date('fecha_fin_inc');
            $table->string('dias_incapacidad',255);
            $table->string('tipo_incapacidad',255);
            $table->string('observacion',255)->nullable();
            $table->unsignedBigInteger('historia_id');
            $table->foreign('historia_id', 'fk_historia_incapacidad')->references('id_historia')->on('historia')->onDelete('restrict')->onUpdate('restrict');
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
        Schema::dropIfExists('incapacidad');
    }
}
