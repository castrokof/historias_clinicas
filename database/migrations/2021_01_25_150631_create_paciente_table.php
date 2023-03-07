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
            $table->bigIncrements('id_paciente');
            $table->string('papellido',100);
            $table->string('sapellido',100)->nullable();
            $table->string('pnombre',100);
            $table->string('snombre',100)->nullable();
            $table->string('tipo_documento',10);
            $table->string('documento',19)->unique();
            $table->unsignedInteger('edad');
            $table->string('direccion',100)->nullable();
            $table->string('celular',50);
            $table->string('telefono',50)->nullable();
            $table->string('solicitud', 20)->nullable();
            $table->string('autorizacion', 100)->nullable();
            $table->string('grupo',45)->nullable();
            $table->unsignedBigInteger('ocupacion_id');
            $table->string('Poblacion_especial', 200)->nullable();
            $table->unsignedBigInteger('pais_id');
            $table->unsignedBigInteger('departamento_id');
            $table->unsignedBigInteger('ciudad_id');
            $table->unsignedBigInteger('barrio_id');
            $table->string('sexo', 100)->nullable();
            $table->string('orientacion_sexual', 100)->nullable();
            $table->string('regimen', 100);
            $table->unsignedBigInteger('eps_id');
            $table->string('eps_nombre', 255)->nullable();
            $table->string('afiliacion',100)->nullable();
            $table->string('nivel',10)->nullable();
            $table->string('numero_afiliacion', 100)->nullable();
            $table->string('operador', 200)->nullable();
            $table->string('correo', 100)->nullable();
            $table->string('futuro', 100)->nullable();
            $table->string('futuro2', 100)->nullable(); //Este dato es la fecha de nacimiento del paciente
            $table->string('futuro4', 100)->nullable();
            $table->string('observaciones', 200)->nullable();
            $table->string('estado_solicitud_farma', 45)->nullable();
            $table->unsignedBigInteger('usuario_id');
            $table->foreign('usuario_id', 'fk_paciente_usuario')->references('id')->on('usuario')->onDelete('restrict')->onUpdate('restrict');
            $table->foreign('pais_id', 'fk_paciente_paises')->references('id_pais')->on('paises')->onDelete('restrict')->onUpdate('restrict');
            $table->foreign('departamento_id', 'fk_paciente_departamento')->references('id_departamento')->on('departamentos')->onDelete('restrict')->onUpdate('restrict');
            $table->foreign('ciudad_id','fk_paciente_ciudad')->references('id_ciudad')->on('ciudades')->onDelete('restrict')->onUpdate('restrict');
            $table->foreign('barrio_id','fk_paciente_barrio')->references('id_barrio')->on('barrios')->onDelete('restrict')->onUpdate('restrict');
            $table->foreign('ocupacion_id','fk_paciente_ocupacion')->references('id_ocupacion')->on('ocupaciones')->onDelete('restrict')->onUpdate('restrict');
            $table->foreign('eps_id','fk_paciente_eps_empresa')->references('id_eps_empresas')->on('eps_empresas')->onDelete('restrict')->onUpdate('restrict');
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
