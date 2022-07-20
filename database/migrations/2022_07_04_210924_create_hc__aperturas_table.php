<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHcAperturasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('hc__aperturas', function (Blueprint $table) {
            $table->bigIncrements('id_apertura');
            $table->string('historia',200)->nullable();//Este es el documento del paciente
            $table->string('tipo_historia',255)->nullable();// Este dato se trae de la tabla hc__def__tipos_historia_clinicas
            $table->dateTime('fechahora_ingreso')->nullable();//Fecha y hra en que se crea o se graba la apertura de la historia clinica
            $table->string('motivo_consulta',255)->nullable();
            $table->string('enfermedad_actual',255)->nullable();
            $table->string('revision_digestiva',255)->nullable();
            $table->string('revision_cardiovascular',255)->nullable();
            $table->string('revision_respiratoria',255)->nullable();
            $table->string('revision_ORL',255)->nullable();
            $table->string('revision_endocrino',255)->nullable();
            $table->string('revision_genitourinaria',255)->nullable();
            $table->string('revision_osteomuscular',255)->nullable();
            $table->string('revision_sisnervioso',255)->nullable();
            $table->string('revision_psicologico',255)->nullable();
            $table->string('ANT_PATOLOGICOS',255)->nullable();
            $table->string('ANT_QUIRURGICOS',255)->nullable();
            $table->string('ANT_TOXICOALERGICOS',255)->nullable();
            $table->string('ANT_HOSPITALIZACION',255)->nullable();
            $table->string('ANT_TRAUMATICOS',255)->nullable();
            $table->string('ANT_FARMACOLOGICOS',255)->nullable();
            $table->string('ANT_INMUNOLOGICOS',255)->nullable();
            $table->string('ANT_GINECOLOGICOS',255)->nullable();
            $table->string('ANT_GINEC_GRAVIDEZ',255)->nullable();
            $table->string('ANT_GINEC_PARTOS',255)->nullable();
            $table->string('ANT_GINEC_ABORTOS',255)->nullable();
            $table->string('ANT_GINEC_CESAREAS',255)->nullable();
            $table->string('ANT_GINEC_ECTOPICOS',255)->nullable();
            $table->string('ANT_GINEC_VIVOS',255)->nullable();
            $table->string('ANT_GINEC_MUERTOS',255)->nullable();
            $table->string('ANT_GINEC_FUPARTO',255)->nullable();
            $table->string('ANT_GINEC_FUMENSTRUACION',255)->nullable();
            $table->string('ANT_GINEC_CICLO',255)->nullable();
            $table->string('ANT_GINEC_DURACION',255)->nullable();
            $table->string('ANT_GINEC_MENARCA',255)->nullable();
            $table->string('ANT_GINEC_MENOPAUSIA',255)->nullable();
            $table->string('ANT_GINEC_INICIOSEXUAL',255)->nullable();
            $table->string('ANT_GINEC_PAREJAS',255)->nullable();
            $table->string('ANT_GINEC_EMBARAZO',255)->nullable();
            $table->string('ANT_GINEC_EDADG',255)->nullable();
            $table->string('ANT_GINEC_FPPARTO',255)->nullable();
            $table->string('ANT_GINEC_CITOL_FECHA',255)->nullable();
            $table->string('ANT_GINEC_CITOL_RESULTADO',255)->nullable();
            $table->string('ANT_GINEC_COLPOSCOPIAS',255)->nullable();
            $table->string('ANT_GINEC_LEUCORREA',255)->nullable();
            $table->string('ANT_GINEC_INFERTILIDAD',255)->nullable();
            $table->string('ANT_PLANIFICACION',255)->nullable();
            $table->string('ANT_ETS',255)->nullable();
            $table->string('ANT_FAMILIARES',255)->nullable();
            $table->string('ANT_HABITOS',255)->nullable();
            $table->string('ANT_LABORALES',255)->nullable();
            $table->string('OBSERVACIONES',255)->nullable();            
            $table->unsignedBigInteger('paciente_id');
            $table->foreign('paciente_id', 'fk_apertura_paciente')->references('id_paciente')->on('paciente')->onDelete('restrict')->onUpdate('restrict');
            $table->unsignedBigInteger('usuario_id');
            $table->foreign('usuario_id', 'fk_apertura_usuario')->references('id')->on('usuario')->onDelete('restrict')->onUpdate('restrict');
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
        Schema::dropIfExists('hc__aperturas');
    }
}
