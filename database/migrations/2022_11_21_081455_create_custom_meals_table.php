<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCustomMealsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('custom_meals', function (Blueprint $table) {

            $table->bigIncrements('id');
            $table->string('name_ar');
            $table->string('name_en');
            $table->text('img')->comment('صوره الوجبه');
            $table->integer('protein')->comment('البروتين');
            $table->integer('calories')->comment('السعرات');
            $table->integer('Fats')->comment('الدهون');
            $table->integer('carbohydrates')->comment('الكربوهيدرات');
            $table->unsignedBigInteger('user_id')->comment('نوع الوجبه');
            $table->timestamps();

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
        Schema::dropIfExists('custom_meals');
    }
}
