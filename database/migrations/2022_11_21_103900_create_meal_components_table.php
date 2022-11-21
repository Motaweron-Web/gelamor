<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMealComponentsTable extends Migration
{

    public function up()
    {
        //pivot table
        Schema::create('meal_components', function (Blueprint $table) {


            $table->bigIncrements('id');
            $table->unsignedBigInteger('meal_id');
            $table->unsignedBigInteger('component_id');
            $table->timestamps();

            $table->foreign('meal_id')->references('id')->on('meals')->cascadeOnUpdate()->cascadeOnDelete();
            $table->foreign('component_id')->references('id')->on('components')->cascadeOnUpdate()->cascadeOnDelete();

        });
    }


    public function down()
    {
        Schema::dropIfExists('meal_components');
    }
}
