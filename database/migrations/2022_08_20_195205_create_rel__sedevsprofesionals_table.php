<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRelSedevsprofesionalsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rel__sedevsprofesionals', function (Blueprint $table) {
            $table->bigIncrements('id_sedevsprofesionals');
            $table->unsignedBigInteger('sede_id');
            $table->unsignedBigInteger('profesional_id');
            $table->foreign('sede_id', 'fk_sede_prof')->references('id_sede')->on('def__sedes')->onDelete('restrict')->onUpdate('restrict');
            $table->foreign('profesional_id', 'fk_prof_sede')->references('id_profesional')->on('def__profesionales')->onDelete('restrict')->onUpdate('restrict');
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
        Schema::dropIfExists('rel__sedevsprofesionals');
    }
}
