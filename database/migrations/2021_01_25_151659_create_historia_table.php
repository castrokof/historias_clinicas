<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateHistoriaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('historia', function (Blueprint $table) {
            $table->bigIncrements('id_historia');
            $table->string('cie10_motivo_consulta',200)->nullable();
            $table->string('motivo_consulta',255)->nullable();
            $table->string('enfermedad_actual',255)->nullable();
            $table->string('antecedente_farma',255)->nullable();
            $table->string('antecedente_qui',255)->nullable();
            $table->string('alergia',255)->nullable();
            $table->string('familiares',255)->nullable();
            $table->string('traumatico',255)->nullable();
            $table->unsignedInteger('presion_arterial_1')->nullable();
            $table->unsignedInteger('presion_arterial_2')->nullable();
            $table->string('toma_presion',45)->nullable();
            $table->unsignedInteger('frecuencia_cardiaca')->nullable();
            $table->unsignedInteger('temperatura')->nullable();
            $table->unsignedInteger('saturacion_oxigeno')->nullable();
            $table->unsignedInteger('pulson')->nullable();
            $table->string('cabezacuello',255)->nullable();
            $table->string('torax',255)->nullable();
            $table->string('abdomen',255)->nullable();
            $table->string('extremidad',255)->nullable();
            $table->string('genitourinario',255)->nullable();
            $table->string('sis_nervioso_cen',255)->nullable();
            $table->string('obsteomuscular',255)->nullable();
            $table->dateTime('fechahora_ingreso')->nullable();
            $table->string('recom_covid',255)->nullable();
            $table->string('recomendacionespf',255)->nullable();
            $table->string('recomendacionespt',255)->nullable();
            $table->string('recomendacionesd',255)->nullable();
            $table->string('recomendacionesg',255)->nullable();
            $table->string('futuro1',255)->nullable();
            $table->string('futuro2',255)->nullable();
            $table->string('futuro3',255)->nullable();
            $table->unsignedInteger('peso')->nullable();
            $table->unsignedInteger('talla')->nullable();
            $table->decimal('imc',10,2)->nullable();
            $table->string('patologico',255)->nullable();
            $table->string('hospitalario',255)->nullable();
            $table->string('toxico',255)->nullable();
            $table->string('cuello',255)->nullable();
            $table->string('car_pulmonar',255)->nullable();
            $table->unsignedInteger('paciente_id');
            $table->foreign('paciente_id', 'fk_historia_paciente')->references('id_paciente')->on('paciente')->onDelete('restrict')->onUpdate('restrict');
            $table->unsignedInteger('usuario_id');
            $table->foreign('usuario_id', 'fk_historia_usuario')->references('id')->on('usuario')->onDelete('restrict')->onUpdate('restrict');
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
        Schema::dropIfExists('historia');
    }
}
