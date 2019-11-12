<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePeriodosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('periodos', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('anio');
            $table->integer('periodo');
            $table->date('fechainicio');
            $table->date('fechafin');
            $table->date('fechainicio1');
            $table->date('fechafin1');
            $table->date('fechainicio2');
            $table->date('fechafin2');
            $table->date('fechainicio3');
            $table->date('fechafin3');
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
        Schema::dropIfExists('periodos');
    }
}
