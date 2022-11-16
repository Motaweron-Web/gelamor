<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{

    public function up(){

        Schema::create('users', function (Blueprint $table) {

            $table->bigIncrements('id');
            $table->text('img')->nullable();
            $table->string('name_ar');
            $table->string('name_en');
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->string('location_ar')->comment('موقع العميل بالعربي');
            $table->string('location_en')->comment('موقع العميل بالانجليزي');
            $table->string('phone')->unique()->comment('هاتف العميل');
            $table->unsignedBigInteger('country_id');
            $table->boolean('is_active')->default(true)->comment('0 is unActive and 1 is active');
            $table->rememberToken();
            $table->timestamps();

            $table->foreign('country_id')->references('id')->on('countries')->cascadeOnDelete()->cascadeOnUpdate();
        });
    }


    public function down()
    {
        Schema::dropIfExists('users');
    }
}
