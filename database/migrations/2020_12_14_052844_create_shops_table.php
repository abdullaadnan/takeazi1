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
            $table->bigIncrements('id');
            $table->integer('shop_code')->nullable();
            $table->string('short_name')->nullable();
            $table->string('name');
            $table->string('shop_type');
            $table->string('mobile1');
            $table->string('mobile2');
            $table->string('latitude');
            $table->string('longitude');
            $table->string('quote')->nullable();
            $table->string('address_1');
            $table->string('address_2')->nullable();
            $table->string('address_3')->nullable();
            $table->integer('pincode_id');
            $table->string('licence_code');
            $table->string('shop_thumbnail');
            $table->string('shop_banner1');
            $table->string('shop_banner2')->nullable();
            $table->boolean('is_display');
            $table->boolean('status');
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
