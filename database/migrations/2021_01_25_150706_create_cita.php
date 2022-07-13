<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCita extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cita', function (Blueprint $table) {
            $table->bigIncrements('id_cita');
            $table->dateTime('fechahora');
            $table->date('fechasp')->nullable();
            $table->dateTime('fechaspdh')->nullable();
            $table->string('tipo_cita',45)->nullable();
            $table->string('futuro1',45)->nullable();
            $table->string('futuro2',45)->nullable();
            $table->string('futuro3',45)->nullable();
            $table->string('sede',45)->nullable();
            $table->string('asistio',45)->nullable();
            $table->unsignedInteger('paciente_id');
            $table->foreign('paciente_id', 'fk_cita_paciente')->references('id_paciente')->on('paciente')->onDelete('restrict')->onUpdate('restrict');
            $table->unsignedInteger('usuario_id');
            $table->foreign('usuario_id', 'fk_cita_usuario')->references('id')->on('usuario')->onDelete('restrict')->onUpdate('restrict');
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
        Schema::dropIfExists('cita');
    }
}
