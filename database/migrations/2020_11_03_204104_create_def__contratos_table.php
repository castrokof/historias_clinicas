<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDefContratosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('def__contratos', function (Blueprint $table) {
            $table->bigIncrements('id_contrato');
            $table->string('contrato',20)->unique();
            $table->string('nombre',200);
            $table->string('descripcion',200)->nullable();
            $table->string('tipo_contrato',200);
            $table->dateTime('fecha_ini')->nullable();
            $table->dateTime('fecha_fin')->nullable();
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
        Schema::dropIfExists('def__contratos');
    }
}
