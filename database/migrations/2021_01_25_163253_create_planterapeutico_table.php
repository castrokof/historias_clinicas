<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePlanterapeuticoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('planterapeutico', function (Blueprint $table) {
            $table->bigIncrements('id_plant');
            $table->string('observacion',255)->nullable();
            $table->unsignedInteger('cups_id');
            $table->foreign('cups_id', 'fk_planterapeutico_cups')->references('id_cups')->on('cups')->onDelete('restrict')->onUpdate('restrict');
            $table->unsignedBigInteger('historia_id');
            $table->foreign('historia_id', 'fk_historia_planterapeutico')->references('id_historia')->on('historia')->onDelete('restrict')->onUpdate('restrict');
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
        Schema::dropIfExists('planterapeutico');
    }
}
