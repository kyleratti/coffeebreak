<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

use App\Drink\Flavor;
use App\Drink\Drink;

class CreateHazelnutDrink extends Migration
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
            'name' => 'Hazelnut Vanilla Latte',
            'description' => 'A cross between hazelnut and vanilla to create an authentic French beverage. Tastes very similar to a French Vanilla latte.',
            'shots' => 2,
        ]);
        $objFrenchVanilla->flavors()->attach($objVanillaFlavor->id);
        $objFrenchVanilla->flavors()->attach($objHazelnutFlavor->id);
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
