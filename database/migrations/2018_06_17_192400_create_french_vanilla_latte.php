<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

use App\Drink\Flavor;
use App\Drink\Drink;

class CreateFrenchVanillaLatte extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        $objFrenchVanillaFlavor = Flavor::where('name', 'French Vanilla')->first();

        $objFrenchVanillaLatte = Drink::create([
            'name' => 'French Vanilla Latte',
            'description' => 'A latte made with actual French Vanilla syrup',
            'shots' => 2,
        ]);
        $objFrenchVanillaLatte->flavors()->attach($objFrenchVanillaFlavor->id);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
