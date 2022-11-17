<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMealsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
//        Schema::create('meals', function (Blueprint $table) {
//            $table->id();
//            $table->string('name');
//            $table->text('img');
//            $table->string('protein');
//            $table->string('calories');
//            $table->string('fats');
//            $table->string('carbohydrates');
//            $table->enum('type', array('basic', 'special'));
//            $table->bigInteger('component_id')->unsigned();
//            $table->foreign('component_id')->references('id')->on('components')->cascadeOnDelete();
//            $table->timestamps();
//        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('meals');
    }
}
