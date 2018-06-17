<?php

namespace App\Drink;

use Illuminate\Database\Eloquent\Model;

class Flavor extends Model
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
     * The drinks that belong to the flavor
     */
    public function drinks()
    {
        return $this->belongstoMany('App\Drink\Drink');
    }

    /**
     * Get all flavors currently out of stock
     * 
     * @return array
     */
    public static function allOutOfStock()
    {
        $arrOOSFlavors = Flavor::where('is_in_stock', 0)->orderBy('name')->get();
        $arrOOS = [];

        foreach($arrOOSFlavors as $objFlavor) {
            if(!$objFlavor->is_in_stock) {
                $arrOOS[] = $objFlavor;
            }
        }

        return $arrOOS;
    }
}
