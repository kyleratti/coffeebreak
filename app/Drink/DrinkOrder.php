<?php

namespace App\Drink;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class DrinkOrder extends Model
{
    use SoftDeletes;

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
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $dates = [
        'created_at',
        'updated_at',
        'finished_at',
        'deleted_at',
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
     * The type of milk desired with this order
     * 
     * @return Milk
     */
    public function milk()
    {
        return $this->belongsTo('App\Drink\Milk');
    }
}
