<?php

namespace App;

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
        'name', 'email', 'password', 'role', 'bio', 'uid'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];


    public function isAdmin(){
        return $this->role >= 3;
    }

    public function isInstructor(){
        return $this->role >= 2;
    }

    public function isNormal(){
        return $this->role >= 1;
    }

    public function office(){
        return $this->hasOne(Office::class);
    }

    public function lectures(){
        return $this->hasMany(Lecture::class);
    }

    public function scopeAdmins($query){
        return $query->where('role', 3)->get();
    }
}
