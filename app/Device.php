<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Device extends Model
{

    protected $fillable = [
        'ip', 'room', 'deviceable_id', 'last_seen'
    ];

    public function deviceable(){
        return $this->morphTo();
    }


    public function getBroadcast(){
        return Broadcast::latest()->get()->filter(function ($broadcast, $key){
            return $broadcast->isActive() && $broadcast->hasDevice($this->deviceable->id);
        })->first();
    }

    public function type(){
        return $this->deviceable_type == 'App\Hall' ? 0 : 1;
    }

    public function getCurrentLecture(){
        if($this->type() == 0){
            return $this->deviceable->lectures->filter(function($lecture, $key){
                return $lecture->isActive();
            })->first();
        }else{
            return $this->deviceable->instructor->lectures->filter(function($lecture, $key){
                return $lecture->isActive();
            })->first();
        }
    }

    public function getNextLecture(){

        if($this->type() == 0){
            return $this->deviceable->lectures()->orderBy('start')->get()->filter(function($lecture, $key){
                return $lecture->isToday() && $lecture->start->gt(Carbon::now());
            })->first();
        }else{
            return $this->deviceable->instructor->lectures()->orderBy('start')->get()->filter(function($lecture, $key){
                return $lecture->isToday() && $lecture->start->gt(Carbon::now());
            })->first();
        }
    }



}
