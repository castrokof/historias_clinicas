<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFcFacturasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('fc__facturas', function (Blueprint $table) {
            $table->bigIncrements('id_factura');
            $table->string('cod_documentos',10); //Este es el codigo de la factura
            $table->string('numero_factura',100);//Este es el consecutivo de la factura
            $table->dateTime('fechahora');
            $table->string('tipo_documento',10);
            $table->string('documento',19);//Este es el numero de documento del paciente
            $table->string('papellido',100);
            $table->string('sapellido',100)->nullable();
            $table->string('pnombre',100);
            $table->string('snombre',100)->nullable();
            $table->unsignedInteger('edad');
            $table->string('regimen', 100); //Este campo corresponde al Régimen
            $table->string('eps', 45)->nullable();
            $table->string('eps_nombre', 255)->nullable();
            $table->string('afiliacion',100)->nullable();
            $table->string('nivel',10)->nullable();
            $table->string('sede',45);
            //$table->string('usuario',20); //Cajero
            $table->char('anulada',1);
            $table->unsignedBigInteger('causa_id')->nullable();  //Causa de anulacion
            $table->dateTime('fecha_anulacion')->nullable();
            $table->string('usuario_anulo',20)->nullable();
            $table->unsignedBigInteger('paciente_id');
            $table->foreign('paciente_id', 'fk_factura_paciente')->references('id_paciente')->on('paciente')->onDelete('restrict')->onUpdate('restrict');
            $table->unsignedBigInteger('usuario_id');
            $table->foreign('usuario_id', 'fk_factura_usuario')->references('id')->on('usuario')->onDelete('restrict')->onUpdate('restrict');
            $table->foreign('causa_id', 'fk_factura_causa')->references('id_causa')->on('estado__causas')->onDelete('restrict')->onUpdate('restrict');
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
        Schema::dropIfExists('fc__facturas');
    }
}
