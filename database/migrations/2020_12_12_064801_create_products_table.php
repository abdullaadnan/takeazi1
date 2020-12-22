<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

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
            $table->bigIncrements('id');
            $table->integer('shop_id');
           // $table->foreign('shop_id')->references('id')->on('shops')->onDelete('cascade');
            $table->string('product_name');
            $table->integer('product_category_id')->nullable();
           // $table->foreign('product_category_id')->references('id')->on('product_category')->onDelete('cascade');
            $table->string('description',1000)->nullable();
            $table->string('food_contents')->nullable();
            $table->string('incredients')->nullable();
            $table->string('production_method')->nullable();
            $table->boolean('is_veg');
            $table->boolean('is_stock');
            $table->boolean('is_offer');
            $table->integer('mrp');
            $table->integer('selling_price');
            $table->integer('cost_price');
            $table->integer('waiting_time')->nullable();
            $table->string('thumbnail')->nullable();
            $table->integer('grab_price')->nullable();
            $table->string('grab_price_from')->nullable();
            $table->string('grab_price_to')->nullable();
            $table->boolean('status')->default(1);
            $table->timestamp('created_at');
            $table->timestamp('updated_at')->nullable();
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
