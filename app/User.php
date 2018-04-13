<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    protected $fillable = [
        'name', 'email', 'password', 'role', 'bio', 'uid'
    ];

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
