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
     * The flavors that belong to the drink
     */
    public function flavors()
    {
        return $this->belongsToMany('App\Drink\Flavor');
    }

    /**
     * Check if the drink is in stock (checks flavors, too)
     * 
     * @return boolean
     */
    public function isInStock()
    {
        if($this->flavors()->where('is_in_stock', 0)->count() > 0)
            return false;

        return $this->is_in_stock;
    }
}
