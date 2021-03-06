<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    protected $guarded = [];

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    // protected $fillable = [
    //     'name', 'email', 'password',
    // ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function totalBranch() {
        return $this->hasMany("App\Models\Branch","user_id");
    }

    public function totalWaiter() {
        return $this->hasMany("App\Models\Waiter","user_id");
    }

    public function totalChef() {
        return $this->hasMany("App\Models\Chef","user_id");
    }

    public function foodItem() {
        return $this->hasMany("App\Models\Food","user_id");
    }

    public function payment() {
        return $this->hasMany("App\Models\Payment","user_id");
    }

    



}
