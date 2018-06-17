<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

use App\Drink\Flavor;
use App\Drink\Drink;

class CreateFrenchVanillaHotChocolate extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        $objChocolateFlavor = Flavor::where('name', 'Chocolate Mocha')->first();
        $objFrenchVanillaFlavor = Flavor::where('name', 'French Vanilla')->first();

        $objHotChocolate = Drink::create([
            'name' => 'Hot Chocolate w/ French Vanilla',
            'description' => 'Hot chocolate made with french vanilla syrup for added flavor instead of standard vanilla',
            'shots' => 0,
        ]);
        $objHotChocolate->flavors()->attach($objChocolateFlavor->id);
        $objHotChocolate->flavors()->attach($objFrenchVanillaFlavor->id);
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
