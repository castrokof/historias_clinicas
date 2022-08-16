<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDefFinalidadesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('def__finalidades', function (Blueprint $table) {
            $table->bigIncrements('id_finalidad');
            $table->unsignedBigInteger('finalidad');
            $table->string('nombre',255);
            $table->string('regimen',255)->nullable();
            $table->unsignedBigInteger('eps_empresas_id')->nullable();
            $table->unsignedBigInteger('servicio_id')->nullable();
            $table->unsignedInteger('edad_min')->nullable();
            $table->unsignedInteger('edad_max')->nullable();
            $table->string('genero', 100)->nullable();
            $table->char('embarazo',1);
            $table->foreign('eps_empresas_id', 'fk_finalidad_empresas')->references('id_eps_empresas')->on('eps_empresas')->onDelete('restrict')->onUpdate('restrict');
            $table->foreign('servicio_id', 'fk_servicio_finalidad')->references('id_servicio')->on('servicios')->onDelete('restrict')->onUpdate('restrict');
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
        Schema::dropIfExists('def__finalidades');
    }
}
