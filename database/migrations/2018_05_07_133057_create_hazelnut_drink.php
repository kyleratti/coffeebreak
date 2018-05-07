<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CrateHazelnutDrink extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        $objHazelnutFlavor = Flavor::create([
            'name' => 'Hazelnut',
            'is_in_stock' => true,
        ]);

        $objVanillaFlavor = Flavor::where('name', 'Vanilla')->first();

        // Drinks
        $objHazelnut = Drink::create([
            'name' => 'Hazelnut Latte',
            'description' => 'A classic latte with hazelnut flavoring',
            'shots' => 2,
        ]);
        $objHazelnut->flavors()->attach($objHazelnutFlavor->id);

        $objFrenchVanilla = Drink::create([
            'name' => 'French Vanilla Latte',
            'description' => 'A cross between hazelnut and vanilla to create an authentic French beverage',
            'shots' => 2,
        ]);
        $objHazelnut->flavors()->attach($objVanillaFlavor->id);
        $objHazelnut->flavors()->attach($objHazelnutFlavor->id);
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
