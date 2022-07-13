<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEpsCopagoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('eps_copago', function (Blueprint $table) {
            $table->bigIncrements('id_eps_copago');
            $table->string('codigo_empresa',45);
            //$table->string('nivel',255)->nullable();
            $table->unsignedBigInteger('eps_niveles_id');
            $table->unsignedBigInteger('eps_empresas_id');
            $table->string('regimen',20)->nullable(); 
            $table->string('nombre_regimen',255)->nullable();
            $table->string('afiliacion',255)->nullable();
            $table->string('vlr_copago',255)->nullable();
            $table->char('estado',1);            
            $table->foreign('eps_niveles_id', 'fk_niveles_copago')->references('id_eps_niveles')->on('eps_niveles')->onDelete('restrict')->onUpdate('restrict');
            $table->foreign('eps_empresas_id', 'fk_copago_empresas')->references('id_eps_empresas')->on('eps_empresas')->onDelete('restrict')->onUpdate('restrict');
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
        Schema::dropIfExists('eps_copago');
    }
}
