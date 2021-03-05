<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDesarrolloHumanosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('desarrollo_humanos', function (Blueprint $table) {
            $table->id();
            $table->string("posicion")->nullable();
            $table->string("subdireccion")->nullable();
            $table->string("rupo")->nullable();
            $table->string("motivo_vacante")->nullable();
            $table->string("vigencia")->nullable();
            $table->string("plaza")->nullable();
            $table->string("gerencia")->nullable();
            $table->string("validacion")->nullable();
            $table->string("memorandum")->nullable();
            $table->string("cedula_siep")->nullable();
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
        Schema::dropIfExists('desarrollo_humanos');
    }
}
