<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class InformacioEmpresa extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('informacio_empresa', function (Blueprint $table) {
            $table->id();
            $table->string('nom_empresa');
            $table->string('eslogan')->nullable();
            $table->string('tel');
            $table->string('correu');
            $table->string('cp');
            $table->string('ciutat');
            $table->string('carrer');
            $table->string('numero');
            $table->unsignedBigInteger('imatge_logo_id');
            $table->timestamps();
            $table->foreign('imatge_logo_id')->references('id')->on('imatge_logo')->onUpdate('cascade')->onDelete('restrict');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
        Schema::dropIfExists('informacio_empresa');
    }
}
