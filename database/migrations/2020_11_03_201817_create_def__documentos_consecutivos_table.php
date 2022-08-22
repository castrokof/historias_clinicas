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
            $table->unsignedBigInteger('documento_id')->unique();
            $table->unsignedBigInteger('consecutivo');
            $table->unsignedBigInteger('sede_id');
            $table->string('observaciones',200)->nullable();//Este campo sirve para poner un pie de pagina en la factura cuando se deba generar la RES DIAN
            $table->foreign('documento_id', 'fk_documento_consecutivo')->references('id_documento')->on('def__documentos')->onDelete('restrict')->onUpdate('restrict');
            $table->foreign('sede_id', 'fk_sede_doc_consecutivo')->references('id_sede')->on('def__sedes')->onDelete('restrict')->onUpdate('restrict');
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
