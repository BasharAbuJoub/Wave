<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Enums\AnnouncementType;
use App\Jobs\AnnouncementDeleteJob;
use Illuminate\Support\Carbon;

class Announcement extends Model
{
    //

    protected $fillable = [
        'type', 'note'
    ];


    public static function boot(){
        parent::boot();

        static::created(function($model){
            dispatch(new AnnouncementDeleteJob($model))->delay($model->lecture->end()->addMinutes(5));
        });
    }

    public function lecture(){
        return $this->belongsTo(Lecture::class);
    }

    public function getTypeTitle(){
        switch ($this->type){
            case AnnouncementType::CANCEL : 
                return 'Cancelled';
            case AnnouncementType::DELAY : 
                return 'Delayed';
            default:
                return 'Unknown';
        }
    }

}
