<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class Overview extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {

        $device = $this->device;

        $broadcast = $device->getBroadcast();
        $lecture = $device->getCurrentLecture();
        $anc = $lecture != null ? $lecture->getAnnouncement() : null;
        $next = $device->getNextLecture();


        if($broadcast != null){
            return [
                'hall'      => $device->room,
                'status'    => 'Broadcast',
                'info'      => $broadcast->line1 . ' - ' . $broadcast->line2,
                'start'     => $broadcast->start,
                'end'       => $broadcast->end,
            ];
        }elseif($anc != null){
            return [
                'hall'      => $device->room,
                'status'    => $anc->getTypeTitle(),
                'info'      => $lecture->course . ' - NOTE:' . $anc->note,
                'start'     => $lecture->start,
                'end'       => $lecture->end,
            ];
        }elseif($lecture != null){
            return [
                'hall'      => $device->room,
                'status'    => 'Normal',
                'info'      => $lecture->course . ' - ' . $lecture->instructor->name,
                'start'     => $lecture->start,
                'end'       => $lecture->end,
            ];
        }elseif($next != null){
            return [
                'hall'      => $device->room,
                'status'    => 'Next',
                'info'      => $next->course . ' - ' . $next->instructor->name ,
                'start'     => $next->start,
                'end'       => $next->end,
            ];
        }else{
            return [
                'hall'      => $device->room,
                'status'    => 'No lecture',
                'info'      =>  '-',
                'start'     =>  '-',
                'end'       =>  '-',
            ];
        }

    }
}
