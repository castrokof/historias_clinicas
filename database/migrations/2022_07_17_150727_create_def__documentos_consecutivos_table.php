<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDefDocumentosConsecutivosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('def__documentos_consecutivos', function (Blueprint $table) {
            $table->bigIncrements('id_documento_consecutivo');
            $table->unsignedBigInteger('documento_id');
            $table->unsignedBigInteger('consecutivo');
            $table->string('sede',200);
            $table->string('observaciones',200)->nullable();//Este campo sirve para poner un pie de pagina en la factura cuando se deba generar la RES DIAN            
            $table->foreign('documento_id', 'fk_documento_consecutivo')->references('id_documento')->on('def__documentos')->onDelete('restrict')->onUpdate('restrict');
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
        Schema::dropIfExists('def__documentos_consecutivos');
    }
}
