<?php

namespace App\Http\Controllers\Order;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

use App\Drink\Drink;
use App\Drink\Flavor;
use App\Drink\DrinkOrder;

use App\Events\OrderPlaced;

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

        $objDrink = Drink::where('id', $iDrinkID)->first();

        $objOrder = new DrinkOrder();
        $objOrder->shots = $iShots;
        $objOrder->milk = $iMilkType;
        $objOrder->drink()->associate($objDrink);
        $objOrder->user()->associate(Auth::user());
        $objOrder->save();

        event(new OrderPlaced($objOrder));

        return view('order.place', [
            'objOrder' => $objOrder
        ]);
    }
}
