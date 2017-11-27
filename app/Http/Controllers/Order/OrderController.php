<?php

namespace App\Http\Controllers\Order;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Drink\Drink;
use App\Drink\Flavor;

class OrderController extends Controller
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
     * Place a drink order
     * 
     * @return View
     */
    public function store(Request $objRequest)
    {
        $objValidatedData = $objRequest->validate([
            'drink' => 'bail|required',
            'shots' => 'bail|required|between:0,4',
            'milk' => 'required|between:1,2',
        ]);

        $iDrinkID = intval($objRequest->input('drink'));
        $iShots = intval($objRequest->input('shots'));
        $iMilkType = intval($objRequest->input('milk'));

        $objDrink = Drink::where('id', $iDrinkID);

        if($objDrink)
        {
            //
        }
        else
        {
            // not found
        }

        return view('order.place');
    }
}
