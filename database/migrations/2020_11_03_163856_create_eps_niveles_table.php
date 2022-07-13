<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEpsNivelesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('eps_niveles', function (Blueprint $table) {
            $table->bigIncrements('id_eps_niveles');
            $table->string('codigo_empresa',45);
            $table->unsignedBigInteger('eps_empresas_id');
            $table->string('nivel',10);
            $table->string('descripcion_nivel',45);
            $table->string('regimen',20)->nullable();
            $table->string('tipo_recuperacion',20)->nullable();
            $table->string('afiliacion',100)->nullable();
            $table->string('servicios',255)->nullable();
            $table->string('vlr_copago',255)->nullable();
            $table->char('estado',1);
            $table->foreign('eps_empresas_id', 'fk_niveles_empresas')->references('id_eps_empresas')->on('eps_empresas')->onDelete('restrict')->onUpdate('restrict');                                  
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
        Schema::dropIfExists('eps_niveles');
    }
}
