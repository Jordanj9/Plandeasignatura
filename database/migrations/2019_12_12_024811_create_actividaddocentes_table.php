<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateActividaddocentesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('actividaddocentes', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('nombre');
            $table->integer('valor');
            $table->string('tipo', 30);
            $table->string('descripcion')->nullable();
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
        Schema::dropIfExists('actividaddocentes');
    }
}
