<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRelProgramasvspacientesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rel__programasvspacientes', function (Blueprint $table) {
            $table->bigIncrements('id_rel_programasvspacientes');
            $table->unsignedBigInteger('programa_id');
            $table->unsignedBigInteger('paciente_id');
            $table->string('descripcion_programa', 155)->nullable();
            $table->foreign('programa_id', 'fk_paciente_programa')->references('id_programa')->on('def__programas')->onDelete('restrict')->onUpdate('restrict');
            $table->foreign('paciente_id', 'fk_programa_paciente')->references('id_paciente')->on('paciente')->onDelete('restrict')->onUpdate('restrict');
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
        Schema::dropIfExists('rel__programasvspacientes');
    }
}
