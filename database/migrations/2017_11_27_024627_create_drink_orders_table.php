<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDrinkOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('drink_orders', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('drink_id')->index();
            $table->foreign('drink_id')->references('id')->on('drinks');
            $table->integer('user_id')->index();
            $table->foreign('user_id')->references('id')->on('users');
            $table->integer('milk_id')->index();
            $table->foreign('milk_id')->references('id')->on('milks');
            $table->unsignedTinyInteger('shots');
            $table->timestamp('finished_at')->nullable()->index();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('drink_orders');
    }
}
