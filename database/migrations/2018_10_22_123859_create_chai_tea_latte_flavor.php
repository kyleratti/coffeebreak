<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

use App\Drink\Flavor;
use App\Drink\Drink;

class CreateChaiTeaLatteFlavor extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        $objChaiTeaFlavor = Flavor::create([
            'name' => 'Chai Tea',
            'is_in_stock' => true,
        ]);

        // Drinks
        $objFrenchVanilla = Drink::create([
            'name' => 'Chai Tea Latte',
            'description' => 'A Chai Tea latte. Comes with no shots usually.',
            'shots' => 0,
        ]);
        $objFrenchVanilla->flavors()->attach($objChaiTeaFlavor->id);
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
