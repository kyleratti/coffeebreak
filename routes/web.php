<?php

use App\Drink\DrinkOrder;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome', [
        'iNumOrders' => DrinkOrder::whereNotNull('finished_at')->count(),
    ]);
})->name('home');

// /admin/
Route::get('/admin/settings/accepting_orders/toggle', 'Admin\SettingsController@toggleAcceptingOrders')
    ->name('admin.settings.accepting_orders.toggle');

Route::get('/admin/settings/availability/milk/toggle/{iMilkID}', 'Admin\SettingsController@toggleMilkAvailability')
    ->name('admin.settings.availability.milk.toggle');

Route::get('/admin/settings/availability/flavor/toggle/{iFlavorID}', 'Admin\SettingsController@toggleFlavorAvailability')
    ->name('admin.settings.availability.flavor.toggle');

Route::post('/admin/drink/complete', 'Admin\DrinkController@completed')
    ->name('admin.drink.completed');

Route::post('/admin/drink/abandon', 'Admin\DrinkController@abandon')
    ->name('admin.drink.abandon');

// /menu/
Route::get('/menu', 'Menu\MenuController@show')
    ->name('menu');

// /order
Route::post('/order/store', 'Order\OrderController@store')
    ->name('order.place');

Route::get('/order/complete', 'Order\OrderController@complete')
    ->name('order.complete');

Route::get('/order/store/mailable', function() {
    return new App\Mail\OrderPlaced(App\Drink\DrinkOrder::first());
});

Route::get('/order/view/open', 'Order\OrderController@viewOpen')
    ->middleware(\App\Http\Middleware\IsBarista::class)
    ->name('order.view.open');

// /recipe
Route::get('/recipe/view', 'Recipe\RecipeController@view')
    ->middleware(\App\Http\Middleware\IsBarista::class)
    ->name('recipe.view');

// /user/
Route::get('/user/login', 'User\LoginController@showLogin')
    ->name('user.login');

Route::get('/user/login/go', 'Auth\AuthController@redirectToProvider')
    ->name('user.login.go');

Route::get('/user/logout', 'User\LoginController@showLogout')
    ->name('user.logout');

Route::get('/user/auth/continue', 'Auth\AuthController@handleProviderCallback');
