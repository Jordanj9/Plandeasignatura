<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTrabajosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('trabajos', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('titulo');
            $table->string('acta')->nullable();
            $table->date('fecha')->nullable();
            $table->date('iniciacion')->nullable();
            $table->date('terminacion')->nullable();
            $table->integer('hora_semana')->nullable();
            $table->string('descripcion')->nullable();
            $table->string('institucion')->nullable();
            $table->bigInteger('item_id')->unsigned();
            $table->foreign('item_id')->references('id')->on('items')->onDelete('cascade');
            $table->bigInteger('plandetrabajo_id')->unsigned();
            $table->foreign('plandetrabajo_id')->references('id')->on('plandetrabajos')->onDelete('cascade');
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
        Schema::dropIfExists('trabajos');
    }
}
