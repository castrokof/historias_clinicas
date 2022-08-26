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
            $table->dateTime('fechahora_cita');//Cupo de la cita
            $table->dateTime('fechahora_solicitud')->nullable();//Cupo de solicitud
            $table->dateTime('fechahora_solicitada')->nullable();//Cupo de solicitada
            $table->integer('orden')->nullable();
            $table->date('fechasp')->nullable();
            $table->dateTime('fechaspdh')->nullable();
            $table->string('tipo_solicitud',45)->nullable();//Presencial, teleconsulta,
            $table->string('ips',100)->nullable();//Ips
            $table->string('tipo_documento',45)->nullable();//Ej: CC, TI, CE,
            $table->string('historia',45)->nullable();//Este es el numero de documento del paciente
            $table->string('papellido',100)->nullable();
            $table->string('sapellido',100)->nullable();
            $table->string('pnombre',100)->nullable();
            $table->string('snombre',100)->nullable();
            $table->string('cod_documentos',10)->nullable(); //Este es el codigo de la factura
            $table->string('numero_factura',255)->nullable();//Este es el consecutivo de la factura
            $table->string('servicio',150)->nullable();
            $table->string('cod_profesional',20)->nullable();//Este dato se captura de la tabla def__profesionales
            $table->string('nombre_profesional',20)->nullable();//Este dato se captura de la tabla def__profesionales
            $table->string('cod_cups',45)->nullable(); //Este dato se captura de la tabla def__procedimientos
            $table->string('contrato',45)->nullable();//Este dato se captura de la tabla def__contratos
            $table->string('regimen', 100)->nullable();
            $table->string('eps', 45)->nullable();
            $table->string('nivel',10)->nullable();
            $table->string('regimen_fac', 100)->nullable();
            $table->string('eps_fac', 45)->nullable();
            $table->string('nivel_fac',10)->nullable();
            $table->string('tipo_cita',45)->nullable();
            $table->string('futuro1',45)->nullable();
            $table->string('futuro2',45)->nullable();
            $table->string('futuro3',45)->nullable();
            $table->string('doc_hospitalizacion',45)->nullable();
            $table->string('orden_hospitalizacion',45)->nullable();
            $table->string('atencion_hospitalizacion',45)->nullable();
            $table->string('sede',45)->nullable();
            $table->string('estado',45)->nullable();//Este es el estado de la cita
            $table->string('bloqueo',45)->nullable();
            $table->string('usuario',100)->nullable();//Este es el nombre del usuario que agenda la cita
            $table->unsignedBigInteger('profesional_id');
            $table->foreign('profesional_id', 'fk_cita_profesional')->references('id_profesional')->on('def__profesionales')->onDelete('restrict')->onUpdate('restrict');
            $table->unsignedBigInteger('cups_id')->nullable();
            $table->foreign('cups_id', 'fk_cita_cups')->references('id_cups')->on('def__procedimientos')->onDelete('restrict')->onUpdate('restrict');
            $table->unsignedBigInteger('contrato_id')->nullable();
            $table->foreign('contrato_id', 'fk_cita_contrato')->references('id_contrato')->on('def__contratos')->onDelete('restrict')->onUpdate('restrict');
            $table->unsignedBigInteger('observacion_id')->nullable();
            $table->foreign('observacion_id', 'fk_cita_observacion')->references('id_observacion')->on('observacion_citas')->onDelete('restrict')->onUpdate('restrict');
            $table->unsignedBigInteger('factura_id')->nullable();
            $table->foreign('factura_id', 'fk_cita_factura')->references('id_factura')->on('fc__facturas')->onDelete('restrict')->onUpdate('restrict');
            $table->unsignedBigInteger('servicio_id')->nullable();//Este dato corresponde al centro de produccion
            $table->foreign('servicio_id', 'fk_cita_servicio')->references('id_servicio')->on('servicios')->onDelete('restrict')->onUpdate('restrict');
            $table->unsignedBigInteger('paciente_id')->nullable();
            $table->foreign('paciente_id', 'fk_cita_paciente')->references('id_paciente')->on('paciente')->onDelete('restrict')->onUpdate('restrict');
            $table->unsignedBigInteger('usuario_id')->nullable();
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
