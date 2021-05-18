<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Projectes extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('projectes', function (Blueprint $table) {
            $table->id();
            $table->string('titol')->unique();
            $table->text('descripcio_breu');
            $table->text('descripcio_detallada');
            $table->string('provincia')->nullable();
            $table->string('ciutat')->nullable();
            $table->string('zip_cp')->nullable();
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
        Schema::dropIfExists('projectes');
    }
}
