<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;
use App\Jobs\AnnouncementDeleteJob;

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

        $end =  Carbon::parse($this->end)->addDays($sum);
        $anc = $this->announcements()->create(['type' => $type, 'note' => $note, 'until' => $end]);
        return $anc;
        //dispatch(new AnnouncementDeleteJob($anc))->delay($end);
    }


    public function announcements(){
        return $this->hasMany(Announcement::class);
    }

    /*
    (in + (n - 1)) % l : index of the last deleted lecture
    days[(in + (n - 1)) % l] - today + ((n/size) * 7)
    l : length of the array (days)
    n : number of lectures
    in : index of the next lecture


    */

}
