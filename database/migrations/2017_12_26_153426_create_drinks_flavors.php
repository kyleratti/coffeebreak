<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

use App\Drink\Drink;
use App\Drink\Flavor;
use App\Drink\Milk;

class CreateDrinksFlavors extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        // Flavors
        $objVanilla = Flavor::create([
            'name' => 'Vanilla',
            'is_in_stock' => true,
        ]);

        $objPeach = Flavor::create([
            'name' => 'Peach',
            'is_in_stock' => true,
        ]);

        $objRaspberry = Flavor::create([
            'name' => 'Raspberry',
            'is_in_stock' => true,
        ]);

        // Milks
        $objMilk = Milk::create([
            'name' => 'Milk',
            'is_in_stock' => true,
        ]);

        $objAlmondMilk = Milk::create([
            'name' => 'Almond Milk',
            'is_in_stock' => true,
        ]);

        // Drinks
        $objLatte = Drink::create([
            'name' => 'Latte',
            'description' => 'A classic latte consisting of steamed milk and espresso shots',
            'shots' => 2,
            'is_in_stock' => true,
        ]);

        $objVanillaLatte = Drink::create([
            'name' => 'Vanilla Latte',
            'description' => 'Your standard latte with some vanilla flavoring',
            'shots' => 2,
            'is_in_stock' => true,
        ]);
        $objVanillaLatte->flavors()->attach($objVanilla->id);

        $objRaspberryLatte = Drink::create([
            'name' => 'Raspberry Latte',
            'description' => 'A latte with raspberry flavoring',
            'shots' => 2,
            'is_in_stock' => true,
        ]);
        $objRaspberryLatte->flavors()->attach($objRaspberry->id);
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
