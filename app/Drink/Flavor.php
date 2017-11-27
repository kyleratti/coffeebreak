<?php

namespace App;

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
     * The drinks that belong to the flavor
     */
    public function drinks()
    {
        return $this->belongstoMany('App\Drink\Drink');
    }
}
