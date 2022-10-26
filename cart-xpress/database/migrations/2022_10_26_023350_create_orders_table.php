<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('customerID');
            $table->dateTime('orderedDate')->nullable()->default(null);
            $table->dateTime('requireDate')->nullable()->default(null);
            $table->dateTime('deliveredDate')->nullable()->default(null);
            $table->dateTime('reOrderedDate')->nullable()->default(null);
            $table->string('status')->default('on-cart');
            $table->text('comment');
            $table->timestamps();
            $table->foreign('customerID')->references('id')->on('customers');
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
};
