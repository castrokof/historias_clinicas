<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDefGrupoysubgrupomedsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('def__grupoysubgrupomeds', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('cod_grupo',20)->unique();
            $table->string('nombre_grupo',255);
            $table->char('estado',1);
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
        Schema::dropIfExists('def__grupoysubgrupomeds');
    }
}
