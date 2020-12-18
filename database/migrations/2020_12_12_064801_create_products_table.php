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
            $table->string('product_name');
            $table->integer('product_category_id');
            $table->string('prdct_img');
            $table->json('details')->nullable();
            $table->integer('mrp');
            $table->integer('selling_price');
            $table->integer('cost_price');
            $table->integer('waiting_time');
            $table->boolean('status');
            $table->boolean('is_offer')->nullable();
            $table->integer('grb_rs')->nullable();
            $table->integer('spcl_ofr')->nullable();
            $table->date('from_date')->nullable();
            $table->date('till_date')->nullable();
            $table->boolean('veg_non');
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
