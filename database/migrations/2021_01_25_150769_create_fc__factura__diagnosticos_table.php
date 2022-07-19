<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFcFacturaDiagnosticosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('fc__factura__diagnosticos', function (Blueprint $table) {
            $table->bigIncrements('id_fc_factura_diagnosticos');
            $table->string('cod_documentos',10); //Este es el codigo de la factura
            $table->string('numero_factura',100);//Este es el consecutivo de la factura
            $table->string('codigo_cie10',45);
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
        Schema::dropIfExists('fc__factura__diagnosticos');
    }
}
