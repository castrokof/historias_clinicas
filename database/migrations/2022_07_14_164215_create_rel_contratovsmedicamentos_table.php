<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRelContratovsmedicamentosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rel__contratovsmedicamentos', function (Blueprint $table) {
            $table->bigIncrements('id_contratovsmedicamento');
            $table->unsignedBigInteger('contrato_id');
            $table->unsignedBigInteger('medicamento_id');
            $table->string('valor', 200);
            $table->foreign('contrato_id', 'fk_contrato_medicamento')->references('id_contrato')->on('def__contratos')->onDelete('restrict')->onUpdate('restrict');
            $table->foreign('medicamento_id', 'fk_medicamento_contrato')->references('id_medicamento')->on('def__medicamentos_suministros')->onDelete('restrict')->onUpdate('restrict');
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
        Schema::dropIfExists('rel__contratovsmedicamentos');
    }
}
