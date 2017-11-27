<?php

namespace App;

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
        'shots',
        'description',
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
     * The flavors that belong to the drink
     */
    public function flavors()
    {
        return $this->belongsToMany('App\Drink\Flavor');
    }
}
