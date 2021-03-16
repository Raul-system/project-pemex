<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateContratadosTable extends Migration
{
    public function up()
    {
        Schema::create('contratados', function (Blueprint $table) {
            $table->id();
            $table->string("posicion");
            $table->string("subdireccion");
            $table->string("grupo");
            $table->text("motivo_vacante");
            $table->string("vigencia");
            $table->string("plaza");
            $table->string("gerencia");
            $table->string("ficha");
            $table->string("profesion");
            $table->string("situacion_Contractual");
            $table->string("resultados_tecnicos");
            $table->string("nombre");
            $table->string("num_Cedula");
            $table->string("cpp");
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
        Schema::dropIfExists('contratados');
    }
}
