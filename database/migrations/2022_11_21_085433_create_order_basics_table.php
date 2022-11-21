<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrderBasicsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {

        //user has many order basic

        Schema::create('order_basics', function (Blueprint $table) {

            $table->bigIncrements('id');
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('meal_id');
            $table->integer('protein');
            $table->date('order_date');
            $table->timestamps();

            $table->foreign('meal_id')->references('id')->on('meals')->cascadeOnUpdate()->cascadeOnDelete();
            $table->foreign('user_id')->references('id')->on('users')->cascadeOnUpdate()->cascadeOnDelete();

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('order_basics');
    }
}
