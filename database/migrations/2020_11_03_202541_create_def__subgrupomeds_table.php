<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDefSubgrupomedsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('def__subgrupomeds', function (Blueprint $table) {
            $table->bigIncrements('id_subgrupo');
            $table->unsignedBigInteger('cod_subgrupo')->nullable();
            $table->string('descripcion_subgrupo',255);
            $table->unsignedBigInteger('grupo_id');
            $table->foreign('grupo_id', 'fk_subgrupo_grupo')->references('id')->on('def__grupoysubgrupomeds')->onDelete('restrict')->onUpdate('restrict');
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
        Schema::dropIfExists('def__subgrupomeds');
    }
}
