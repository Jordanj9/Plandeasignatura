<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDocentesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('docentes', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('tipo_documento', 30);
            $table->string('identificacion', 12)->unique();
            $table->string('primer_nombre', 20);
            $table->string('segundo_nombre', 20)->nullable();
            $table->string('primer_apellido', 20);
            $table->string('segundo_apellido', 20);
            $table->string('email', 100);
            $table->bigInteger('telefono')->nullable();
            $table->enum('categoria', ['AUXILIAR', 'ASISTENTE', 'ASOCIADO', 'TITULAR']);
            $table->enum('vinculacion', ['PLANTA', 'OCACIONAL']);
            $table->enum('dedicacion', ['EXCLUSIVA', 'TIEMPO COMPLETO', 'MEDIO TIEMPO', 'CATEDRA']);
            $table->enum('sede', ['VALLEDUPAR', 'AGUACHICA']);
            $table->bigInteger('departamento_id')->unsigned();
            $table->foreign('departamento_id')->references('id')->on('departamentos')->onDelete('cascade');
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
        Schema::dropIfExists('docentes');
    }
}
