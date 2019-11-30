<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEjetematicosemanaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ejetematicosemana', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('semana_id')->unsigned();
            $table->foreign('semana_id')->references('id')->on('semanas')->onDelete('cascade');
            $table->bigInteger('ejetematico_id')->unsigned();
            $table->foreign('ejetematico_id')->references('id')->on('ejetematicos')->onDelete('cascade');
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
        Schema::dropIfExists('ejetematicosemana');
    }
}
