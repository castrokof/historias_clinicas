<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDefATCMedicamentosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('def__a_t_c__medicamentos', function (Blueprint $table) {
            $table->bigIncrements('id_ATC');
            $table->string('cod_atc',40);
            $table->string('nombre',255);
            $table->string('consecutivo_forma',10);
            $table->string('forma',255);
            $table->string('concentracion',255);
            $table->string('via_administracion',100)->nullable();
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
        Schema::dropIfExists('def__a_t_c__medicamentos');
    }
}
