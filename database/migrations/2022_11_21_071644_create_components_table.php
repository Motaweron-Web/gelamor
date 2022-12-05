<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateComponentsTable extends Migration
{

    public function up()
    {
        Schema::create('components', function (Blueprint $table) {

            $table->bigIncrements('id');
            $table->text('img')->nullable();
            $table->string('name_ar');
            $table->string('name_en');
            $table->integer('protein')->comment('البروتين');
            $table->integer('calories')->comment('السعرات');
            $table->integer('fats')->comment('الدهون');
            $table->integer('carbohydrates')->comment('الكربوهيدرات');
            $table->unsignedBigInteger('component_categories_id');

            $table->foreign('component_categories_id')->references('id')->on('component_categories')->cascadeOnUpdate()->cascadeOnDelete();
            $table->timestamps();

        });
    }


    public function down()
    {
        Schema::dropIfExists('components');
    }
}
