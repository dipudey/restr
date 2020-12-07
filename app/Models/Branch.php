<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class Branch extends Authenticatable
{
    use Notifiable;

    protected $guarded = [];

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


    public function user() {
        return $this->belongsTo('App\User','user_id');
    }

    public function totalFood() {
        return $this->hasMany(BranchFood::class,'branch_id');
    }

    public function totalWaiter() {
        return $this->hasMany(Waiter::class,'branch_id');
    }
}
