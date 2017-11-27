<?php

namespace App\Http\Controllers\Menu;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Drink\Drink;

class MenuController extends Controller
{
    /**
     * Instantiate a new order controller instance
     * 
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the menu
     * 
     * @return View
     */
    public function show()
    {
        $arrDrinksInStock = [];

        foreach(Drink::where('is_in_stock', 1)->get() as $objDrink) {
            if($objDrink->isInStock())
                $arrDrinksInStock[] = $objDrink;
        }

        return view('menu.show', [
            'objDrinks' => $arrDrinksInStock,
        ]);
    }
}
