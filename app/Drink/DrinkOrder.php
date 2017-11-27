<?php

namespace App\Drink;

use Illuminate\Database\Eloquent\Model;

class DrinkOrder extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'shots',
        'milk',
        'finished_at',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
    ];

    /**
     * The drink that belongs to this order
     * 
     * @return Drink
     */
    public function drink()
    {
        return $this->belongsTo('App\Drink\Drink');
    }

    /**
     * The user that owns this order
     * 
     * @return User
     */
    public function user()
    {
        return $this->belongsTo('App\User\User');
    }

    /**
     * Translate the milk ID to the type of milk
     * 
     * @return string
     */
    public function getMilkType()
    {
        switch($this->milk)
        {
            case 1:
                return "Whole";
            case 2:
                return "Almond";
            default:
                return "Whole";
        }

        return "Whole";
    }
}
