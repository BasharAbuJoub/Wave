<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Lecture extends Model
{

    protected $fillable = [
        'course', 'instructor', 'start', 'end', 'office_id', 'hall_id', 'days'
    ];

    protected $casts = [
        'days' => 'array'
    ];

    public function start(){
        return Carbon::parse($this->start);
    }

    public function end(){
        return Carbon::parse($this->end);
    }

    public function isToday(){
        return in_array(Carbon::now()->dayOfWeek, $this->days);
    }

    public function isActive(){
        return Carbon::now()->between($this->start(), $this->end()) && $this->isToday();
    }
    
    public function office(){
        return $this->belongsTo(Office::class);
    }


    public function hall(){
        return $this->belongsTo(Hall::class);
    }

    public function getAnnouncement(){
        return $this->announcements()->latest()->first();
    }

    public function announcements(){
        return $this->hasMany(Announcement::class);
    }

}
