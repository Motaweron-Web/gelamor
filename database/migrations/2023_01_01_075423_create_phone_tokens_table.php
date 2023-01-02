<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePhoneTokensTable extends Migration
{

    public function up()
    {
        Schema::create('phone_tokens', function (Blueprint $table) {

            $table->bigIncrements('id');
            $table->unsignedBigInteger('admin_id');
            $table->text('token');
            $table->foreign('admin_id')->references('id')->on('admins')->cascadeOnUpdate()->cascadeOnDelete();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('phone_tokens');
    }
}
