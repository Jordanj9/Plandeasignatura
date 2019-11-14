<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEstudiantesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('estudiantes', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('tipo_documento', 30);
            $table->string('identificacion', 12)->unique();
            $table->string('primer_nombre', 20);
            $table->string('segundo_nombre', 20)->nullable();
            $table->string('primer_apellido', 20);
            $table->string('segundo_apellido', 20);
            $table->string('email', 100);
            $table->bigInteger('telefono')->nullable();
            $table->timestamps();
        });

        Schema::create('cargaacademica_estudiantes', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('cargaacademica_id')->unsigned();
            $table->foreign('cargaacademica_id')->references('id')->on('cargaacademicas')->onDelete('cascade');
            $table->bigInteger('estudiante_id')->unsigned();
            $table->foreign('estudiante_id')->references('id')->on('estudiantes')->onDelete('cascade');
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
        Schema::dropIfExists('estudiantes');
    }
}
