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
            $table->string('name_ar')->comment('نوع الوجبه بالعربي');
            $table->string('name_en')->comment('نوع الوجبه بالانجليزي');
            $table->text('details_ar')->nullable()->comment('تفاصيل نوع الوجبه بالعربي');
            $table->text('details_en')->nullable()->comment('تفاصيل نوع الوجبه بالانجليزي');
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
