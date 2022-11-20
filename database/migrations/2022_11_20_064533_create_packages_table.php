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
            $table->string('name')->comment('اسم الوجبه');
            $table->string('details')->comment('وصف الوجبه');
            $table->date('start');
            $table->date('end');
            $table->double('price',15,2);
            $table->string('currency_ar');
            $table->string('currency_en');
            $table->enum('status',['show','hide'])->comment('حاله الباقه');
            $table->timestamps();

        });
    }


    public function down()
    {
        Schema::dropIfExists('packages');
    }
}
