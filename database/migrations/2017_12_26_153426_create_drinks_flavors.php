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

        $objCaramel = Flavor::create([
            'name' => 'Caramel',
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

        $objChocolate = Flavor::create([
            'name' => 'Chocolate Mocha',
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
        ]);

        $objVanillaLatte = Drink::create([
            'name' => 'Vanilla Latte',
            'description' => 'Your standard latte with some vanilla flavoring',
            'shots' => 2,
        ]);
        $objVanillaLatte->flavors()->attach($objVanilla->id);

        $objCaramelLatte = Drink::create([
            'name' => 'Caramel Latte',
            'description' => 'A latte with caramel flavoring',
            'shots' => 2,
        ]);
        $objCaramelLatte->flavors()->attach($objCaramel->id);

        $objRaspberryLatte = Drink::create([
            'name' => 'Raspberry Latte',
            'description' => 'A latte with raspberry flavoring',
            'shots' => 2,
        ]);
        $objRaspberryLatte->flavors()->attach($objRaspberry->id);

        $objMocha = Drink::create([
            'name' => 'Mocha',
            'description' => 'A chocolate flavored drink with espresso shots and topped with whipped cream',
            'shots' => 2,
        ]);
        $objMocha->flavors()->attach($objChocolate->id);

        $objHotChocolate = Drink::create([
            'name' => 'Hot Chocolate',
            'description' => 'It\'s hot chocolate! Come on now! Vanilla and chocolate mixed with steamed milk and topped with whipped cream',
            'shots' => 0,
        ]);
        $objHotChocolate->flavors()->attach($objChocolate->id);
        $objHotChocolate->flavors()->attach($objVanilla->id);
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
