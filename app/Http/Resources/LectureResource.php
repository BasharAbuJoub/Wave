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
        $anc_edit = $anc != null ? route('announcements.edit', ['id'=>$anc->id]) : '-';
        $anc_msg = $anc != null ? $anc->getTypeTitle() . ' - ' . $anc->note : '-';

        return [
            'id'        => $this->id,
            'hall'      => $this->hall->device->room,
            'course'    => $this->course,
            'start'     => $this->start,
            'end'       => $this->end,
            'instructor'=> $this->instructor->name,
            'days'      => $this->days,
            'edit'      => route('lectures.edit', ['id' => $this->id]),
            //////////////////////////////////////////////
            'announcement'       => $this->when($anc != null, $anc_msg),
            'anc_link_edit'      => $this->when($anc != null, $anc_edit),
            'anc_link'      => route('announcements.create.lecture', ['lecture' => $this->id]),
            ];
    }
}
