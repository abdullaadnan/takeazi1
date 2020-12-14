<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateShopsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('shops', function (Blueprint $table) {
            $table->bigIncrements('shop_id');
            $table->string('shop_name');
            $table->string('short_name')->nullable();
            $table->string('shop_type');
            $table->string('contact_number');
            $table->string('shop_address',2000);
            $table->integer('shop_pin');
            $table->string('shop_land_mark')->nullable();
            $table->string('shop_location');
            $table->string('shop_license');
            $table->boolean('is_pur_veg');
            $table->json('shop_work_time');
            $table->string('shop_banner_img');
            $table->string('shop_banner_img1');
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
        Schema::dropIfExists('shops');
    }
}
