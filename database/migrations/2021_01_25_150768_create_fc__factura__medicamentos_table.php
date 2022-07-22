<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFcFacturaMedicamentosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('fc__factura__medicamentos', function (Blueprint $table) {
            $table->bigIncrements('id_fc_factura_medicamentos');
            $table->string('cod_documentos',10); //Este es el codigo de la factura
            $table->string('numero_factura',100);//Este es el consecutivo de la factura            
            $table->string('codigo',20); //Este es el codigo del medicamento
            $table->string('cantidad_ordenada',20)->nullable();
            $table->string('cantidad_entregada',20);
            $table->string('unitario',20);
            $table->string('total',20);
            $table->string('pagado',20)->nullable();
            $table->string('servicio',20)->nullable();
            $table->string('profesional',20)->nullable();
            $table->string('CUMS',100)->nullable();
            $table->string('observaciones',255)->nullable();
            // $table->unsignedBigInteger('usuario_id');
            // $table->foreign('usuario_id', 'fk_med_fac_usuario')->references('id')->on('usuario')->onDelete('restrict')->onUpdate('restrict');
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
        Schema::dropIfExists('fc__factura__medicamentos');
    }
}
