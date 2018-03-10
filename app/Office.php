<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Office extends Model
{
    //
    public $timestamps = false;

    protected $fillable = [
        'user_id'
    ];

    public function device(){
        return $this->morphOne(Device::class, 'deviceable');
    }

    
    public function instructor(){
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

}
