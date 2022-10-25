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
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('shopID');
            $table->unsignedBigInteger('categoryID');
            $table->string('name');
            $table->decimal('size', 10, 2);
            $table->text('description');
            $table->integer('quantityInStock');
            $table->decimal('price', 10, 2);
            $table->decimal('discount', 5, 2);
            $table->decimal('durationOfDeliveryByHour', 5, 2);
            $table->string('imagePath');
            $table->timestamps();
            $table->foreign('shopID')->references('id')->on('shops');
            $table->foreign('categoryID')->references('id')->on('categories');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('products');
    }
};
