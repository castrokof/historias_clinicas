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
            $table->string('detalle',255)->nullable();
            $table->string('marca',255);
            $table->string('CUMS',100)->nullable();
            $table->unsignedBigInteger('ATC_id')->nullable();
            //$table->string('cod_atc',5)->nullable();
            $table->unsignedBigInteger('grupo_id');//Este campo va relacionado el Grupo (Controlado, No controlado, etc...)
            $table->unsignedBigInteger('subgrupo_id');//Este campo va relacionado el Subgrupo (Controlado, No controlado, etc...)
            $table->string('IUM',10)->nullable();
            $table->string('invima',50)->nullable();
            $table->string('tipo',50);
            $table->string('stock_max',10)->nullable();
            $table->string('stock_min',10)->nullable();
            $table->unsignedBigInteger('cantidad_maxima')->nullable();//Cantidad maxima de medicamento por preescripcion
            $table->unsignedBigInteger('cantidad_dias')->nullable();//Cantidad de dias entre cada preescripcion
            // $table->unsignedBigInteger('valor_SOAT')->nullable();
            $table->unsignedBigInteger('valor_particular')->nullable();
            $table->char('estado',1);
            $table->foreign('ATC_id', 'fk_ATC_medicamento')->references('id_ATC')->on('def__a_t_c__medicamentos')->onDelete('restrict')->onUpdate('restrict');
            $table->foreign('subgrupo_id', 'fk_grupo_subgrupo')->references('id_subgrupo')->on('def__subgrupomeds')->onDelete('restrict')->onUpdate('restrict');
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
