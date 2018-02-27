<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class LectureResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        $anc = $this->getAnnouncement();

        return [
            'id'        => $this->id,
            'hall'      => $this->hall->device->room,
            'course'    => $this->course,
            'start'     => $this->start,
            'end'       => $this->end,
            'instructor'=> $this->instructor,
            'days'      => $this->days,
            'announcement'       => $this->when($anc != null, function(){
                return $anc->getTypeTitle() . ' - ' . $anc->note;
            }),
            'edit'      => route('lectures.edit', ['id' => $this->id]),
            //////////////////////////////////////////////
            'anc_link'      => $this->when($anc, function(){
                return route('announcements.edit', ['id'=>$anc->id]);
            }),
            'anc_link'      => route('announcements.create'),
            ];
    }
}
