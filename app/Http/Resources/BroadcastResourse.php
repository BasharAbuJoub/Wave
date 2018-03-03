<?php

namespace App\Http\Resources;
use App\Hall;
use Illuminate\Http\Resources\Json\JsonResource;

class BroadcastResourse extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {

        $devices = array();
        foreach($this->devices as $id)
            array_push($devices, ['id' => $id, 'room' => Hall::find($id)->device->room]);
            

        return [
            'id'        => $this->id,
            'devices'   => $devices,
            'line1'     => $this->line1,
            'line2'     => $this->line2,
            'start'     => $this->start,
            'end'       => $this->end
        ];
    }
}
