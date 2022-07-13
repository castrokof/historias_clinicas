<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDefProcedimientosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('def__procedimientos', function (Blueprint $table) {
            $table->Increments('id_cups');
            $table->string('cod_cups',45)->unique();
            $table->string('cod_alterno',45)->nullable();
            $table->string('nombre',255);
            $table->string('grupo',45)->nullable();
            $table->string('finalidad',45)->nullable();
            $table->string('descripcion',255)->nullable();
            $table->string('observacion',255)->nullable();
            $table->string('genero',45)->nullable();
            $table->string('edad_1',45)->nullable();
            $table->string('edad_2',45)->nullable();
            $table->string('cantidad_maxima',45);
            $table->string('valor_particular',45);
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
        Schema::dropIfExists('def__procedimientos');
    }
}
