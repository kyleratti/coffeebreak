<?php

namespace App\Drink;

use Illuminate\Database\Eloquent\Model;

class Milk extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'is_in_stock',
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
        'is_in_stock' => 'boolean',
    ];

    /**
     * The drink order that references this
     * 
     * @return DrinkOrder
     */
    public function drinkorders()
    {
        return $this->belongstoMany('App\Drink\DrinkOrder');
    }

    /**
     * Get all milks currently in stock
     * 
     * @return array
     */
    public static function allInStock()
    {
        $arrAllMilks = Milk::all();
        $arrAvailable = [];

        foreach($arrAllMilks as $objMilk) {
            if($objMilk->is_in_stock) {
                $arrAvailable[] = $objMilk;
            }
        }

        return $arrAvailable;
    }
}
