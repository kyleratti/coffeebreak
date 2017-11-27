<?php

namespace App\Http\Controllers\Menu;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class MenuController extends Controller
{
    /**
     * Show the menu
     * 
     * @return View
     */
    public function show()
    {
        return view('menu.show');
    }
}
