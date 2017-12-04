<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use Unisharp\Setting\SettingFacade as Setting;

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
}
