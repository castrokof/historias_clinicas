<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePacienteTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('paciente', function (Blueprint $table) {
            $table->Increments('id_paciente');
            $table->string('papellido',100);
            $table->string('sapellido',100)->nullable();
            $table->string('pnombre',100);
            $table->string('snombre',100)->nullable();
            $table->string('tipo_documento',10);
            $table->string('documento',19);
            $table->unsignedInteger('edad');
            $table->string('direccion',100)->nullable();
            $table->string('celular',50);
            $table->string('telefono',50)->nullable();
            $table->string('solicitud', 20)->nullable();
            $table->string('autorizacion', 100)->nullable();
            $table->string('grupo',45)->nullable();
            $table->string('plan', 100)->nullable();
            $table->string('ciudad', 100);
            $table->string('sexo', 100)->nullable();
            $table->string('dpto', 45)->nullable();
            $table->string('eps', 45)->nullable();
            $table->string('estado_solicitud_farma', 45)->nullable();
            $table->string('operador', 200)->nullable();
            $table->string('correo', 100)->nullable();
            $table->string('observaciones', 200)->nullable();
            $table->string('futuro', 100)->nullable();
            $table->string('futuro1', 100)->nullable();
            $table->string('futuro2', 100)->nullable();
            $table->string('futuro3', 100)->nullable();
            $table->string('futuro4', 100)->nullable();
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
        Schema::dropIfExists('paciente');
    }
}
