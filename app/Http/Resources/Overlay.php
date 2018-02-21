<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use PhpParser\Node\Expr\Instanceof_;
use Carbon\Carbon;

class Overlay extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request){
        
        $broadcast = $this->getBroadcast();
        $lecture = $this->getCurrentLecture();
        $anc = $lecture != null ? $lecture->getAnnouncement() : null;
        $next = $this->getNextLecture();
        $type = $this->deviceable_type == 'App\Hall' ? 0 : 1;

        #Office
        if($type == 1){
            if($anc != null){
                return [
                    'title' => $this->room,
                    'line1' => $this->deviceable->instructor,
                    'line2' => $anc->getTypeTitle() . ' - ' . $lecture->course
                ];
            }elseif($lecture != null){
                return [
                    'title' => $this->room,
                    'line1' => $this->deviceable->instructor,
                    'line2' => $lecture->course
                ];
            }else{
                return [
                    'title' => $this->room,
                    'line1' => $this->deviceable->instructor,
                    'line2' => $this->deviceable->bio != null ? $this->deviceable->bio : ''
                ];
            }
        }
        #Hall
        else{

            if($broadcast != null){
                return [
                    'title' => $this->room,
                    'line1' => $broadcast->line1,
                    'line2' => $broadcast->line2
                ];
            }elseif($anc != null){
                return [
                    'title' => $this->room,
                    'line1' => $lecture->course . ' - ' . $lecture->instructor,
                    'line2' => $anc->getTypeTitle() . ' - ' . $anc->note
                ];
            }elseif($lecture != null){
                return [
                    'title' => $this->room,
                    'line1' => $lecture->course . ' - ' . $lecture->instructor,
                    'line2' => gmdate('H:i', $lecture->end()->diffInSeconds(Carbon::now())) . ' left.'
                ];
            }elseif($next != null){
                return [
                    'title' => $this->room,
                    'line1' => 'Next lecture start ' . $next->start()->format('H:i'),
                    'line2' => $next->course . ' - ' . $next->instructor
                ];
            }else{
                return[
                    'title' => $this->room,
                    'line1' => 'No lecture',
                    'line2' => ''
                ];
            }



        }



    }
}
