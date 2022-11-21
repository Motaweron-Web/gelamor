<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePackagesTable extends Migration
{

    public function up()
    {
        Schema::create('packages', function (Blueprint $table) {


            $table->bigIncrements('id');
            $table->string('name_ar')->comment('اسم الباقه بالعربي');
            $table->string('name_en')->comment('اسم الباقه بالانجليزي');
            $table->string('details_ar')->nullable();
            $table->string('details_en')->nullable();
            $table->date('start');
            $table->date('end');
            $table->double('price',15,2);
            $table->string('currency_ar');
            $table->string('currency_en');
            $table->enum('type',['basic','special'])->comment('نوع الباقه');
            $table->enum('status',['show','hide'])->comment('حاله الباقه');
            $table->timestamps();

        });
    }


    public function down()
    {
        Schema::dropIfExists('packages');
    }
}
