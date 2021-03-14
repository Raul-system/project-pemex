<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDepartamentoPersonalsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('departamento_personals', function (Blueprint $table) {
            $table->id();
            $table->string("id_integracion")->nullable();
            $table->string("ficha")->nullable();
            $table->string("profesion")->nullable();
            $table->string("situacion_contractual")->nullable();
            $table->string("resultados_tecnicos")->nullable();
            $table->string("nombre")->nullable();
            $table->string("num_cedula")->nullable();
            $table->string("cpp")->nullable();
            $table->string("validacion")->nullable();
            $table->string("carta_no_inhabilitacion")->nullable();
            $table->string("cedula_siep")->nullable();
            $table->string("validacion_siep")->nullable();
            $table->string("resultados_ev_tec")->nullable();
            $table->string("documento1")->nullable();
            $table->string("documento2")->nullable();
            $table->string("documento3")->nullable();
            $table->string("documento4")->nullable();
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
        Schema::dropIfExists('departamento_personals');
    }
}
