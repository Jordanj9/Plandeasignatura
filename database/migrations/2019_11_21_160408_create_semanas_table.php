<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSemanasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('semanas', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('semana');
            $table->text('tema_trabajo');
            $table->text('estrategias');
            $table->text('competencias');
            $table->string('evaluacion');
            $table->string('bibliografia');
            $table->bigInteger('unidad_id')->unsigned();
            $table->foreign('unidad_id')->references('id')->on('unidads')->onDelete('cascade');
            $table->bigInteger('plandedesarrolloasignatura_id')->unsigned();
            $table->foreign('plandedesarrolloasignatura_id')->references('id')->on('plandedesarrolloasignaturas')->onDelete('cascade');
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
        Schema::dropIfExists('semanas');
    }
}
