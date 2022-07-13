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
            //$table->string('plan', 100)->nullable();
            $table->unsignedBigInteger('id_programa', 100)->nullable();
            $table->string('descripcion_programa', 100)->nullable();
            $table->string('Ocupacion', 100)->nullable();
            $table->string('Poblacion_especial', 200)->nullable();              
            $table->unsignedBigInteger('pais_id');            
            $table->string('dpto', 45)->nullable(); 
            $table->string('ciudad', 100);
            $table->string('sexo', 100)->nullable();
            $table->string('orientacion_sexual', 100)->nullable();
            $table->string('plan', 100); //Este campo corresponde al Régimen
            $table->string('eps', 45)->nullable();
            $table->string('eps_nombre', 255)->nullable();
            $table->string('afiliacion',100)->nullable();
            $table->string('nivel',10)->nullable();
            $table->string('numero_afiliacion', 100)->nullable();
            $table->string('operador', 200)->nullable();
            $table->string('correo', 100)->nullable();
            $table->string('futuro', 100)->nullable();
            $table->string('futuro1', 5)->nullable();
            $table->string('futuro2', 100)->nullable();
            $table->string('futuro3', 100)->nullable();
            $table->string('futuro4', 100)->nullable();
            $table->string('observaciones', 200)->nullable();
            $table->string('estado_solicitud_farma', 45)->nullable();            
            $table->foreign('pais_id', 'fk_paciente_paises')->references('id_pais')->on('paises')->onDelete('restrict')->onUpdate('restrict');            
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
