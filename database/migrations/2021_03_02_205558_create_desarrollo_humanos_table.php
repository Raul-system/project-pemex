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
            $table->string("id_integracion")->nullable();
            $table->string("posicion")->nullable();
            $table->string("subdireccion")->nullable();
            $table->string("grupo")->nullable();
            $table->text("motivo_vacante")->nullable();
            $table->string("vigencia")->nullable();
            $table->string("plaza")->nullable();
            $table->string("gerencia")->nullable();
            $table->string("validacion")->default('false');
            $table->text("name_directory");
            $table->longText("memorandum")->nullable();
            $table->longText("cedula_siep")->nullable();
            $table->longText('documento_adicional_1')->nullable();
            $table->longText('documento_adicional_2')->nullable();
            $table->longText('documento_adicional_3')->nullable();
            $table->longText('documento_adicional_4')->nullable();
            $table->longText('documento_adicional_5')->nullable();
            $table->longText('documento_adicional_6')->nullable();
            $table->longText('documento_adicional_7')->nullable();
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
