<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMealsTable extends Migration
{

    public function up()
    {
        Schema::create('meals', function (Blueprint $table) {

            $table->bigIncrements('id');
            $table->string('name_ar');
            $table->string('name_en');
            $table->text('img')->comment('صوره الوجبه');
            $table->integer('protein')->comment('البروتين');
            $table->integer('calories')->comment('السعرات');
            $table->integer('Fats')->comment('الدهون');
            $table->integer('carbohydrates')->comment('الكربوهيدرات');
            $table->text('comment')->nullable()->comment('ملاحظات');
            $table->unsignedBigInteger('meal_type_id')->comment('نوع الوجبه');
            $table->timestamps();

            $table->foreign('meal_type_id')->references('id')->on('meal_types')->cascadeOnUpdate()->cascadeOnDelete();

        });
    }


    public function down()
    {
        Schema::dropIfExists('meals');
    }
}
