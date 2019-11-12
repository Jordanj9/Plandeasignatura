<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAsignaturasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('asignaturas', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('codigo', 10)->unique();
            $table->string('nombre', 50);
            $table->integer('creditos');
            $table->enum('naturaleza', ['PRACTICO', 'TEORICO', 'TEORICO-PRACTICO']);
            $table->string('habilitable', 2);
            $table->integer('total_hora');
            $table->integer('hora_practica')->default(0);
            $table->integer('hora_teorica')->default(0);
            $table->bigInteger('programa_id')->unsigned();
            $table->foreign('programa_id')->references('id')->on('programas')->onDelete('cascade');
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
        Schema::dropIfExists('asignaturas');
    }
}
