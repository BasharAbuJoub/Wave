<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;
use App\Jobs\AnnouncementDeleteJob;

class Lecture extends Model
{

    protected $fillable = [
        'course', 'start', 'end', 'user_id', 'hall_id', 'days'
    ];

    protected $casts = [
        'days' => 'array'
    ];

    protected $dates = [
        'start', 'end'
    ];

    protected $dateFormat = "H:i:s";

    public function getStartAttribute($value){
        return Carbon::parse($value);
    }
    public function getEndAttribute($value){
        return Carbon::parse($value)->subMinutes(($this->start->diffInMinutes(Carbon::parse($value)) / 60) * 10);
    }

    public function isToday(){
        return in_array(Carbon::now()->dayOfWeek, $this->days);
    }

    public function isActive(){
        return Carbon::now()->between($this->start, $this->end) && $this->isToday();
    }
    
    public function instructor(){
        return $this->belongsTo(User::class, 'user_id', 'id');
    }


    public function hall(){
        return $this->belongsTo(Hall::class);
    }

    public function getAnnouncement(){
        return $this->announcements()->latest()->first();
    }

    public function addAnnouncement($count, $type, $note){
  
        $today = Carbon::now()->dayOfWeek;
        $nextIndex = 0;
        $days = $this->days;
        $sum = 0;
        for($i = 0; $i < count($days); $i++)
            if($days[$i] >= $today){
                $nextIndex = $i;
                break;
            }
        
        if($days[$nextIndex] >= $today)
            $sum += $days[$nextIndex] - $today;
        else
            $sum += $days[$nextIndex] + 1 + (6 - $today);

        $prefix = [];

        for($i = 0; $i < count($days) - 1; $i++)
            $prefix[] = $days[$i + 1] - $days[$i];

        $prefix[] = $days[0] + 1 + (6 - $days[count($days) - 1]);

        for($i = $nextIndex; $i < ($count - 1) + $nextIndex ; $i++)
            $sum+= $prefix[$i % count($prefix)];

        $end =  $this->end->addDays($sum);
        $anc = $this->announcements()->create(['type' => $type, 'note' => $note, 'until' => $end]);
        return $anc;
  
    }


    public function announcements(){
        return $this->hasMany(Announcement::class);
    }


}
