<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use Unisharp\Setting\SettingFacade as Setting;

use App\Drink\Milk;
use App\Drink\Flavor;

class SettingsController extends Controller
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
     * Toggle the 'accepting_orders' setting
     * 
     * @return View
     */
    public function toggleAcceptingOrders()
    {
        Setting::set('accepting_orders', !Setting::get('accepting_orders', false));

        return redirect()->back();
    }

    /**
     * Toggle the availability of the specified milk
     * 
     * @return view
     */
    public function toggleMilkAvailability($iMilkID)
    {
        $objMilk = Milk::where('id', $iMilkID)->first();

        if($objMilk === null) {
            // error
        } else {
            $objMilk->is_in_stock = !$objMilk->is_in_stock;
            $objMilk->save();
        }


        return redirect()->back();
    }

    /**
     * Toggle the availability of the specified flavor
     * 
     * @return view
     */
    public function toggleFlavorAvailability($iFlavorID)
    {
        $objFlavor = Flavor::where('id', $iFlavorID)->first();

        if($objFlavor === null) {
            // error
        } else {
            $objFlavor->is_in_stock = !$objFlavor->is_in_stock;
            $objFlavor->save();
        }


        return redirect()->back();
    }
}
