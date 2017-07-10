<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEncargosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('encargos', function (Blueprint $table) {
            $table->increments('id');
            $table->string('albaran', 10);
            $table->string('destinatario', 28);
            $table->string('direccion', 250);
            $table->string('poblacion', 10);
            $table->string('cp', 5);
            $table->string('provincia', 20);
            $table->string('telefono', 10);
            $table->string('observaciones', 10);
            $table->dateTime('fecha');            
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
        Schema::dropIfExists('encargos');
    }
}
