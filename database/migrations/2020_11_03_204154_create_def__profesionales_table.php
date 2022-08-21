<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDefProfesionalesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('def__profesionales', function (Blueprint $table) {
            $table->bigIncrements('id_profesional');
            $table->string('codigo',10)->unique();
            $table->string('nombre',200);
            $table->string('reg_profesional',20);
            $table->string('cod_usuario',100)->unique();
            $table->string('tipo',100);//Ej: Médico especialista, Médico general, Enfermera, Auxiliar de enfermería, Otro
            $table->unsignedBigInteger('especialidad_id');            
            $table->dateTime('fecha_inicio',5)->nullable();//Campo para especificar la fecha de la agenda del medico
            $table->dateTime('fecha_fin',5)->nullable();//Campo para especificar la fecha de la agenda del medico
            $table->string('min_citas_lunes',5)->nullable();//Campo para especificar el tiempo de duracion de cada cita
            $table->string('min_citas_martes',5)->nullable();
            $table->string('min_citas_miercoles',5)->nullable();
            $table->string('min_citas_jueves',5)->nullable();
            $table->string('min_citas_viernes',5)->nullable();
            $table->string('min_citas_sabado',5)->nullable();
            $table->string('min_citas_domingo',5)->nullable();
            $table->char('estado',1);
            $table->foreign('especialidad_id', 'fk_profesional_especialidad')->references('id_especialidad')->on('def__especialidades')->onDelete('restrict')->onUpdate('restrict');
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
        Schema::dropIfExists('def__profesionales');
    }
}
