<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRelContratovsepsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rel__contratovseps', function (Blueprint $table) {
            $table->bigIncrements('id_contratovseps');
            $table->unsignedBigInteger('contrato_id');
            $table->unsignedBigInteger('eps_id');
            $table->foreign('contrato_id', 'fk_contrato_eps')->references('id_contrato')->on('def__contratos')->onDelete('restrict')->onUpdate('restrict');
            $table->foreign('eps_id', 'fk_eps_contrato')->references('id_eps_empresas')->on('eps_empresas')->onDelete('restrict')->onUpdate('restrict');
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
        Schema::dropIfExists('rel__contratovseps');
    }
}
