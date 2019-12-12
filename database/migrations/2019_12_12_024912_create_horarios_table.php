<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHorariosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('horarios', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('dia', 10);
            $table->string('hora', 20);
            $table->bigInteger('actividaddocente_id')->unsigned();
            $table->foreign('actividaddocente_id')->references('id')->on('actividaddocentes')->onDelete('cascade');
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
        Schema::dropIfExists('horarios');
    }
}
