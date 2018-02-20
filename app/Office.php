<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Office extends Model
{
    //
    public $timestamps = false;

    protected $fillable = [
        'instructor', 'bio'
    ];

    public function device(){
        return $this->morphOne(Device::class, 'deviceable');
    }

    
    public function lectures(){
        return $this->hasMany(Lecture::class);
    }


}
