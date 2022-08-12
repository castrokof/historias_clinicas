<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRelServiciovsmedicamentosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rel__serviciovsmedicamentos', function (Blueprint $table) {
            $table->bigIncrements('id_serviciovsmedicamentos');
            $table->unsignedBigInteger('medicamento_id');
            $table->unsignedBigInteger('servicio_id');
            $table->foreign('medicamento_id', 'fk_medicamento_serv')->references('id_medicamento')->on('def__medicamentos_suministros')->onDelete('restrict')->onUpdate('restrict');
            $table->foreign('servicio_id', 'fk_serv_medicamento')->references('id_servicio')->on('servicios')->onDelete('restrict')->onUpdate('restrict');
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
        Schema::dropIfExists('rel__serviciovsmedicamentos');
    }
}
