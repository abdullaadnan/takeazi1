<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductCategoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('product_categories', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('category_name');
            $table->integer('master_category_id');
           // $table->foreign('master_category_id')->references('id')->on('category_type');
            $table->integer('shop_id');
            //$table->foreign('shop_id')->references('id')->on('shops');
            $table->integer('parent_category_id')->nullable();
            $table->string('image_path')->nullable();
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
        Schema::dropIfExists('product_categories');
    }
}
