<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductsTable extends Migration
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
            $table->string('product_name')->unique();
            $table->string('description', 1000)->nullable();
            $table->integer('price');
            $table->string('image_path');
            $table->unsignedBigInteger('category_id');
            $table->unsignedBigInteger('provider_id');
            $table->unsignedBigInteger('storage_id');
            $table->timestamps();
            $table->foreign('category_id')->references('id')->on('product_categories');
            $table->foreign('provider_id')->references('id')->on('providers');
            $table->foreign('storage_id')->references('id')->on('product_storages');
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
}
