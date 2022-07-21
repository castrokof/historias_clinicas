<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHcDefTiposHistoriaClinicasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('hc__def__tipos_historia_clinicas', function (Blueprint $table) {
            $table->bigIncrements('id_tipo_historia');
            $table->string('tipo_historia',20)->nullable();
            $table->string('descripcion',20)->nullable();
            $table->string('horas_cierre',20)->nullable();
            $table->char('rips_obligatorio',1);
            $table->string('orden_impresion',20)->nullable();
            $table->char('ambito1',2); //Este es ambulatorio
            $table->char('ambito2',2);//Este es urgencias
            $table->char('ambito3',2);//Este es hospitalizacion
            $table->char('estado',1);
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
        Schema::dropIfExists('hc__def__tipos_historia_clinicas');
    }
}
