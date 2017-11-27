<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class App\ extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('drink_flavor', function (Blueprint $table) {
            $table->integer('drink_id')->unsigned()->index();
            $table->foreign('drink_id')->references('id')->on('drinks')->onDelete('cascade');
            $table->integer('flavor_id')->unsigned()->index();
            $table->foreign('flavor_id')->references('id')->on('flavors')->onDelete('cascade');
            $table->primary(['drink_id', 'flavor_id']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('drink_flavor');
    }
}
