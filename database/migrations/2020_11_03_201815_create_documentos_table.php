<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDocumentosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('def__documentos', function (Blueprint $table) {
            $table->bigIncrements('id_documento');
            $table->string('cod_documentos',10)->unique();
            //$table->string('consecutivo',255);
            $table->string('nombre',200);
            $table->unsignedBigInteger('tipo_doc_id');
            $table->char('estado',1);
            $table->foreign('tipo_doc_id', 'fk_tipo_codumento')->references('id_tipo_doc')->on('def__tipos_documentos')->onDelete('restrict')->onUpdate('restrict');
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
        Schema::dropIfExists('def__documentos');
    }
}
