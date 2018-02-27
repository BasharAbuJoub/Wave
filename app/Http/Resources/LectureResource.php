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
        return [
            'id'        => $this->id,
            'hall'      => $this->hall->device->room,
            'course'    => $this->course,
            'start'     => $this->start,
            'end'       => $this->end,
            'instructor'=> $this->instructor,
            'anc_link'  => '#',
        ];
    }
}
