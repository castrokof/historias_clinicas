<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDefSedesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('def__sedes', function (Blueprint $table) {
            $table->bigIncrements('id_sede');
            $table->string('cod_sede',10)->unique();
            $table->string('sede',250);
            $table->string('direccion',250);
            $table->string('telefono',20);
            $table->string('email',250);
            $table->unsignedBigInteger('ciudad_id');
            $table->string('logo',250)->nullable();
            $table->char('estado',1);
            $table->foreign('ciudad_id', 'fk_sede_ciudad')->references('id_ciudad')->on('ciudades')->onDelete('restrict')->onUpdate('restrict');
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
        Schema::dropIfExists('def__sedes');
    }
}
