<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDefGrupoProcedimientosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('def__grupo_procedimientos', function (Blueprint $table) {
            $table->bigIncrements('id_grupo');
            $table->string('codigo',20)->unique();
            $table->string('nombre_grupo',255);
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
        Schema::dropIfExists('def__grupo_procedimientos');
    }
}
