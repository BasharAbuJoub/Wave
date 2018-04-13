<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Broadcast extends Model
{
    //
    
    protected $fillable = [
        'devices', 'line1', 'line2', 'start', 'end'
    ];

    protected $casts = [
        'devices' => 'array'
    ];
    
    public function getStartAttribute($value){
        return Carbon::parse($value);
    }

    public function getEndAttribute($value){
        return Carbon::parse($value);
    }

    public function start(){
        return Carbon::parse($this->start);
    }

    public function end(){
        return Carbon::parse($this->end);
    }

    public function hasDevice($id){
        return in_array($id, $this->devices);
    }

    public function isActive(){
        return Carbon::now()->between($this->start(), $this->end());
    }

}
