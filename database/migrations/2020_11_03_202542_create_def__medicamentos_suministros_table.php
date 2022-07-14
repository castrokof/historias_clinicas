<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDefMedicamentosSuministrosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('def__medicamentos_suministros', function (Blueprint $table) {
            $table->bigIncrements('id_medicamento');
            $table->string('codigo',20)->unique();
            $table->string('nombre',255);
            $table->string('marca',255);
            $table->string('CUMS',255);
            $table->string('cod_atc',5);
            $table->string('IUM',5);
            $table->string('tipo',5);            
            $table->string('cantidad_maxima',10);
            $table->string('cantidad_dias',20);
            $table->string('valor_SOAT',45)->nullable();
            $table->string('valor_particular',45)->nullable();
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
        Schema::dropIfExists('def__medicamentos_suministros');
    }
}
