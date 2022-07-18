<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRelProfesionalvsmedicamentosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rel__profesionalvsmedicamentos', function (Blueprint $table) {
            $table->bigIncrements('id_profesionalvsmedicamentos');
            //$table->string('codigo',10);
            $table->unsignedBigInteger('medicamento_id');
            $table->unsignedBigInteger('profesional_id');
            $table->foreign('medicamento_id', 'fk_medicamento_prof')->references('id_medicamento')->on('def__medicamentos_suministros')->onDelete('restrict')->onUpdate('restrict');
            $table->foreign('profesional_id', 'fk_prof_procedimiento')->references('id_profesional')->on('def__profesionales')->onDelete('restrict')->onUpdate('restrict');
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
        Schema::dropIfExists('rel__profesionalvsmedicamentos');
    }
}
