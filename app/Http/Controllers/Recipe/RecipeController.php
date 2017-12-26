<?php

namespace App\Http\Controllers\Recipe;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

use App\Drink\Drink;
use App\Drink\Flavor;
use App\Drink\DrinkOrder;
use App\Drink\Milk;

class RecipeController extends Controller
{
    /**
     * Instantiate a new order controller instance
     * 
     * @return void
     */
    public function __construct()
    {
    }

    /**
     * View all recipes
     * 
     * @return view
     */
    public function view()
    {
        return view('recipe.view', [
            'objIngredients' => [
                'objFlavors' => Flavor::all(),
                'objMilks' => Milk::all(),
            ],
            'objDrinks' => Drink::all(),
        ]);
    }
}
