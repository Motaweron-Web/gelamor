<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMealTypesTable extends Migration
{

    public function up()
    {
        Schema::create('meal_types', function (Blueprint $table) {

            $table->bigIncrements('id');
            $table->string('name')->comment('نوع الوجبه');
            $table->text('details')->nullable()->comment('تفاصيل نوع الوجبه');
            $table->unsignedBigInteger('package_id')->comment('نوع الباقه');
            $table->timestamps();

            $table->foreign('package_id')->references('id')->on('packages')->cascadeOnUpdate()->cascadeOnDelete();
        });
    }


    public function down()
    {
        Schema::dropIfExists('meal_types');
    }
}
