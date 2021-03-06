<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ImatgesCarrousel extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('imatges_carrousel', function (Blueprint $table) {
            $table->id();
            $table->string('url');
            $table->string('alt')->nullable();
            $table->string('color')->nullable();
            $table->string('titol')->nullable();
            $table->text('descripcio')->nullable();
            $table->unsignedBigInteger('posicio');
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
        Schema::dropIfExists('imatges_carrousel');
    }
}
