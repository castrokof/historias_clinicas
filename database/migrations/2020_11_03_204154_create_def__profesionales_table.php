<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDefProfesionalesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('def__profesionales', function (Blueprint $table) {
            $table->bigIncrements('id_profesional');
            $table->string('codigo',10);
            $table->string('nombre',200);
            $table->string('reg_profesional',20);
            $table->string('cod_usuario',100)->unique();
            $table->string('tipo',100);
            $table->string('especialidad',100);
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
        Schema::dropIfExists('def__profesionales');
    }
}
