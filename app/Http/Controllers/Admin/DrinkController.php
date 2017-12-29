<?php

namespace App\Http\Controllers\Admin;

use Carbon\Carbon;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use Unisharp\Setting\SettingFacade as Setting;

use App\Drink\DrinkOrder;
use App\Drink\Drink;
use App\Drink\Milk;
use App\Drink\Flavor;

use App\Events\OrderReady;

class DrinkController extends Controller
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
     * Mark an order as completed
     * 
     * @return view
     */
    public function completed(Request $objRequest)
    {
        $objOrder = DrinkOrder::where('id', $objRequest->input('order_id'))->first();

        if($objOrder === null) {
            // error
        } else {
            $objOrder->finished_at = Carbon::now();
            $objOrder->save();

            event(new OrderReady($objOrder));
        }

        return redirect()->back();
    }

    /**
     * Mark an order as abandoned
     * 
     * @return view
     */
    public function abandon(Request $objRequest)
    {
        $objOrder = DrinkOrder::where('id', $objRequest->input('order_id'))->first();

        if($objOrder === null) {
            // error
        } else {
            $objOrder->delete();
        }

        return redirect()->back();
    }
}
