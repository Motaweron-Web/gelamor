<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrdersTable extends Migration{


    public function up()
    {

        //user has many meal and meal belongs to many user
        Schema::create('orders', function (Blueprint $table) {


            $table->bigIncrements('id');
            $table->unsignedBigInteger('invoice_id');
            $table->unsignedBigInteger('meal_id');
            $table->text('comment')->nullable();
            $table->integer('protein')->nullable();
            $table->timestamps();

            $table->foreign('meal_id')->references('id')->on('meals')->cascadeOnUpdate()->cascadeOnDelete();
            $table->foreign('invoice_id')->references('id')->on('invoices')->cascadeOnUpdate()->cascadeOnDelete();

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('orders');
    }
}
