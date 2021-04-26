<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ProjectesImatges extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('projectes_imatges', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('projecte_id');
            $table->unsignedBigInteger('imatge_id');
            $table->timestamps();
            $table->foreign('projecte_id')->references('id')->on('projectes')->onUpdate('cascade')->onDelete('restrict');
            $table->foreign('imatge_id')->references('id')->on('imatges')->onUpdate('cascade')->onDelete('restrict');
            
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
        Schema::dropIfExists('projectes_imatges');
    }
}
