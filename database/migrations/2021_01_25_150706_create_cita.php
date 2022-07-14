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
            $table->string('cod_profesional',20)->nullable();            
            $table->dateTime('fechahora');//Cupo de la cita
            $table->date('fechasp')->nullable();
            $table->dateTime('fechaspdh')->nullable();
            $table->string('servicio',150)->nullable();
            $table->string('tipo_documento',45)->nullable();//Ej: CC, TI, CE, 
            $table->string('historia',45)->nullable();//Este es el numero de documento del paciente
            $table->string('papellido',100)->nullable();
            $table->string('sapellido',100)->nullable();
            $table->string('pnombre',100)->nullable();
            $table->string('snombre',100)->nullable();
            $table->string('cod_documentos',10); //Este es el codigo de la factura
            $table->string('numero_factura',255);//Este es el consecutivo de la factura
            $table->string('cod_cups',45)->nullable();
            $table->string('contrato',45)->nullable();
            $table->string('regimen', 100)->nullable();
            $table->string('eps', 45)->nullable();
            $table->string('nivel',10)->nullable();
            $table->string('tipo_cita',45)->nullable();
            $table->string('futuro1',45)->nullable();
            $table->string('futuro2',45)->nullable();
            $table->string('futuro3',45)->nullable();
            $table->string('sede',45)->nullable();
            $table->string('asistio',45)->nullable();//Este es el estado de la cita
            $table->string('observaciones',255)->nullable();
            $table->unsignedBigInteger('paciente_id');
            $table->foreign('paciente_id', 'fk_cita_paciente')->references('id_paciente')->on('paciente')->onDelete('restrict')->onUpdate('restrict');
            $table->unsignedBigInteger('usuario_id');
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
