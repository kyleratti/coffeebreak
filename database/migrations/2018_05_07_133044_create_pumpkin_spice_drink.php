<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

use App\Drink\Flavor;
use App\Drink\Drink;

class CreatePumpkinSpiceDrink extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        $objPumpkinFlavor = Flavor::create([
            'name' => 'Pumpkin Spice',
            'is_in_stock' => true,
        ]);

        // Drinks
        $objPSL = Drink::create([
            'name' => 'Pumpkin Spice Latte',
            'description' => 'Liquid pumpkin and espresso shots',
            'shots' => 2,
        ]);
        $objPSL->flavors()->attach($objPumpkinFlavor->id);
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
