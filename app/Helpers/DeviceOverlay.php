<?php 


namespace App\Helpers;

use App\Device;



class DeviceOverlay{

    public $title;
    public $line1;
    public $line2;


    public function __construct(Device $device)
    {

        $broadcast = $device->getBroadcast();
        $lecture = $device->getCurrentLecture();
        $anc = $lecture != null ? $lecture->getAnnouncement() : null;
        $next = $device->getNextLecture();
        $type = $device->deviceable_type == 'App\Hall' ? 0 : 1;
    


        #Office
        if($type == 1){
            if($anc != null){
                $this->title = $device->room;
                $this->line1 = $device->deviceable->instructor->name;
                $this->line2 = $anc->getTypeTitle() . ' - ' . $lecture->course;
            }elseif($lecture != null){
               
                $this->title = $device->room;
                $this->line1 = $device->deviceable->instructor->name;
                $this->line2 = $lecture->course;
               
            }else{
                $this->title = $device->room;
                $this->line1 = $device->deviceable->instructor->name;
                $this->line2 = $device->deviceable->instructor->bio != null ? $device->deviceable->instructor->bio : '';
            }
        }
        #Hall
        else{

            if($broadcast != null){
                $this->title = $device->room;
                $this->line1 = $broadcast->line1;
                $this->line2 = $broadcast->line2;
            }elseif($anc != null){
                $this->title = $device->room;
                $this->line1 = $lecture->course . ' - ' . $lecture->instructor->name;
                $this->line2 = $anc->getTypeTitle() . ' - ' . $anc->note;
            }elseif($lecture != null){
                $this->title = $device->room;
                $this->line1 = $lecture->course . ' - ' . $lecture->instructor->name;
                $this->line2 = gmdate('H:i', $lecture->end()->diffInSeconds(Carbon::now())) . ' left.';
            }elseif($next != null){
                $this->title = $device->room;
                $this->line1 = 'Next lecture start ' . $next->start()->format('H:i');
                $this->line2 =  $next->course . ' - ' . $next->instructor->name;
            }else{
                $this->title = $device->room;
                $this->line1 = 'No lecture';
                $this->line2 = '';
            }



        }


        
    }



}