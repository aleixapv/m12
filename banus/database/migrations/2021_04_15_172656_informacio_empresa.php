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
            $table->string('cif');
            $table->string('eslogan')->nullable();
            $table->string('tel');
            $table->string('tel2')->nullable();
            $table->string('whatsapp')->nullable();
            $table->string('correu');
            $table->string('adreca_1');
            $table->string('adreca_2')->nullable();
            $table->string('ciutat');
            $table->string('provincia');
            $table->string('zip_cp');
            $table->string('nom_logo');
            $table->string('alt_logo');
            $table->string('url_logo');
            $table->string('x');
            $table->string('y');
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
        //
        Schema::dropIfExists('informacio_empresa');
    }
}
