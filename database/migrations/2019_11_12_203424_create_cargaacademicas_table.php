<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCargaacademicasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cargaacademicas', function (Blueprint $table) {

            $table->bigIncrements('id');
            $table->bigInteger('docente_id')->unsigned();
            $table->bigInteger('asignatura_id')->unsigned();
            $table->bigInteger('grupo_id')->unsigned();
            $table->bigInteger('periodo_id')->unsigned();

            //llaves foraneas
            $table->foreign('docente_id')->references('id')->on('docentes')->onDelete('CASCADE');
            $table->foreign('asignatura_id')->references('id')->on('asignaturas')->onDelete('CASCADE');
            $table->foreign('grupo_id')->references('id')->on('grupos')->onDelete('CASCADE');
            $table->foreign('periodo_id')->references('id')->on('periodos')->onDelete('CASCADE');

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
        Schema::dropIfExists('cargaacademicas');
    }
}
