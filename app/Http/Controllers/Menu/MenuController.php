<?php

namespace App\Http\Controllers\Menu;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Drink\Flavor;
use App\Drink\Drink;
use App\Drink\Milk;

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
        return view('menu.show', [
            'objDrinks' => Drink::allInStock(),
            'objMilks' => Milk::allInStock(),

            'objOutOfStock' => Flavor::allOutOfStock(),
        ]);
    }
}
