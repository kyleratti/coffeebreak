<?php

namespace App\User;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'microsoft_id',
        'token',
        'display_name',
        'given_name',
        'surname',
        'email',
        'job_title',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
    ];

    /**
     * Set the user's access token
     * 
     * @param string $strToken
     * @return void
     */
    public function setTokenAttribute($strToken)
    {
        $this->attributes['token'] = encrypt($strToken);
    }

    /**
     * Get the user's access token
     * 
     * @return string
     */
    public function getTokenAttribute()
    {
        try
        {
            return decrypt($this->attributes['token']);
        } catch(DecryptionException $e) {
            Log::error("FATAL ERRROR: Unable to decrypt token: ".$e);
        }

        return null;
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
}
