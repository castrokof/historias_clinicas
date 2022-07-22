<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHcEvolucionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('hc__evolucions', function (Blueprint $table) {
            $table->bigIncrements('id_evolucion');
            $table->unsignedBigInteger('apertura_id');
            $table->unsignedBigInteger('tipo_historia_id');
            $table->string('tipo_historia',255)->nullable();// Este dato se trae de la tabla hc__def__tipos_historia_clinicas
            $table->dateTime('fechahora_evolucion');//Fecha y hra en que se crea o se graba la apertura de la historia clinica
            $table->string('cod_documentos',10); //Este es el codigo de la factura
            $table->string('numero_factura',100);//Este es el consecutivo de la factura
            $table->string('cod_documento_internacion',10); //Este es el codigo de la factura cuando se hace admision
            $table->string('numero_factura_internacion',100);//Este es el consecutivo de la factura se hace admision
            $table->string('Exa_inspeccion_general',100);
            $table->string('Exa_frecuencia_cardiaca',100);
            $table->string('Exa_frecuencia_respiratoria',100);
            $table->string('Exa_tension_diastolica',100);
            $table->string('Exa_tension_sistolica',100);
            $table->string('Exa_temperatura',20);
            $table->string('Exa_peso',20);
            $table->string('Exa_talla',20);
            $table->string('Exa_perimetro_cintura',20);
            $table->string('Exa_cefalico',20);
            $table->string('Exa_saturacion',20);
            $table->string('Rev_cara',20);
            $table->string('Rev_torax',20);
            $table->string('Rev_abdomen',20);
            $table->string('Rev_genital',20);
            $table->string('Rev_extremidades',20);
            $table->string('Rev_neurologico',20);
            $table->string('Rev_piel',20);
            $table->string('Evolucion',20);
            $table->unsignedBigInteger('usuario_id');
            $table->foreign('usuario_id', 'fk_evolucion_usuario')->references('id')->on('usuario')->onDelete('restrict')->onUpdate('restrict');
            $table->foreign('apertura_id', 'fk_apertura_evolucion')->references('id_apertura')->on('hc__aperturas')->onDelete('restrict')->onUpdate('restrict');
            $table->foreign('tipo_historia_id', 'fk_tipo_evolucion')->references('id_tipo_historia')->on('hc__def__tipos_historia_clinicas')->onDelete('restrict')->onUpdate('restrict');
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
        Schema::dropIfExists('hc__evolucions');
    }
}
