<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEjetematicosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ejetematicos', function (Blueprint $table) {

            $table->bigIncrements('id');
            $table->string('nombre');
            $table->bigInteger('unidad_id')->unsigned();
            $table->foreign('unidad_id')->references('id')->on('unidads')->onDelete('CASCADE');
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
        Schema::dropIfExists('ejetematicos');
    }
}
