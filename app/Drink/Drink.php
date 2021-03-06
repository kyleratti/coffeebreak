<?php

namespace App\Drink;

use Illuminate\Database\Eloquent\Model;

class Drink extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'description',
        'shots',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
    ];

    /**
     * The attributes that should be cast to native types
     * 
     * @var array
     */
    protected $casts = [
    ];

    /**
     * The flavors that belong to the drink
     */
    public function flavors()
    {
        return $this->belongsToMany('App\Drink\Flavor');
    }

    /**
     * Get the user's drink orders
     * 
     * @return array
     */
    public function drinkorders()
    {
        return $this->hasMany('App\Drink\DrinkOrder');
    }

    /**
     * Check if the drink is in stock (checks flavors, too)
     * 
     * @return boolean
     */
    public function isInStock()
    {
        return $this->flavors()->where('is_in_stock', 0)->count() == 0;
    }

    /**
     * Get all drinks currently in stock
     * 
     * @return array
     */
    public static function allInStock()
    {
        $arrAllDrinks = Drink::orderBy('name')->get();
        $arrAvailable = [];

        foreach($arrAllDrinks as $objDrink) {
            if($objDrink->isInStock()) {
                $arrAvailable[] = $objDrink;
            }
        }

        return $arrAvailable;
    }
}
