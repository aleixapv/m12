<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ProjectesCategories extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('projectes_categories', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('projecte_id');
            $table->unsignedBigInteger('categoria_id');
            $table->timestamps();
            $table->foreign('projecte_id')->references('id')->on('projectes')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('categoria_id')->references('id')->on('categories')->onUpdate('cascade')->onDelete('cascade');
            
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
        Schema::dropIfExists('projectes_categories');
    }
}
