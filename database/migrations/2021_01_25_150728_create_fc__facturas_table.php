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
            $table->dateTime('fechahora');
            $table->string('papellido',100);
            $table->string('sapellido',100)->nullable();
            $table->string('pnombre',100);
            $table->string('snombre',100)->nullable();
            $table->string('tipo_documento',10);
            $table->string('documento',19);
            $table->string('plan', 100); //Este campo corresponde al Régimen
            $table->string('eps', 45)->nullable();
            $table->string('eps_nombre', 255)->nullable();
            $table->string('afiliacion',100)->nullable();
            $table->string('nivel',10)->nullable();
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
