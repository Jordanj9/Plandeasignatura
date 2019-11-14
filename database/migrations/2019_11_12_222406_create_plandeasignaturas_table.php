<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePlandeasignaturasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('plandeasignaturas', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('dodencia_directa')->nullable();
            $table->integer('trabajo_independiente')->nullable();
            $table->integer('trabajo_semestral')->nullable();
            $table->string('corequisitos')->nullable();
            $table->string('prerequisitos')->nullable();
            $table->text('presentacion')->nullable();
            $table->text('justificacion')->nullable();
            $table->text('objetivogeneral')->nullable();
            $table->text('objetivoespecificos')->nullable();
            $table->text('competencias')->nullable();
            $table->text('metodologias')->nullable();
            $table->text('estrategias')->nullable();
            $table->bigInteger('periodo_id')->unsigned();
            $table->foreign('periodo_id')->references('id')->on('periodos')->onDelete('cascade');
            $table->bigInteger('asignatura_id')->unsigned();
            $table->foreign('asignatura_id')->references('id')->on('asignaturas')->onDelete('cascade');
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
        Schema::dropIfExists('plandeasignaturas');
    }
}
