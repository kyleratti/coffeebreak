<?php

namespace App\Http\Controllers\Order;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

use App\Drink\Drink;
use App\Drink\Flavor;
use App\Drink\DrinkOrder;
use App\Drink\Milk;

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
     * View all open drink orders
     * 
     * @return view
     */
    public function viewOpen()
    {
        return view('order.view.open', [
            'objOrders' => DrinkOrder::whereNull('finished_at')->orderBy('created_at', 'desc')->get(),
        ]);
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
            'milk' => 'required',
        ]);

        $iDrinkID = intval($objRequest->input('drink'));
        $iShots = intval($objRequest->input('shots'));
        $bIced = $objRequest->input('iced') == 'iced';
        $iMilkType = intval($objRequest->input('milk'));

        $objDrink = Drink::where('id', $iDrinkID)->first();
        $objMilk = Milk::where('id', $iMilkType)->first();

        $objOrder = new DrinkOrder();
        $objOrder->shots = $iShots;
        $objOrder->iced = $bIced;
        $objOrder->drink()->associate($objDrink);
        $objOrder->milk()->associate($objMilk);
        $objOrder->user()->associate(Auth::user());
        $objOrder->save();

        event(new OrderPlaced($objOrder));

        return view('order.place', [
            'objOrder' => $objOrder
        ]);
    }
}
