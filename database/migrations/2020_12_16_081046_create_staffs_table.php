<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateStaffsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('staffs', function (Blueprint $table) {
            $table->bigIncrements('staff_id');
            $table->Boolean('rstrnt_type');
            $table->string('staff_name');
            $table->string('address',1000);
            $table->string('pin');
            $table->string('landmark')->nullable();
            $table->integer('commission');
            $table->string('email');
            $table->string('designation');
            $table->string('city');
            $table->string('state');
            $table->integer('phone_number');
            $table->string('staff_img')->nullable();
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
        Schema::dropIfExists('staffs');
    }
}
