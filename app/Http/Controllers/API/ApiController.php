<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\OverlayCollection;
use App\Hall;
use App\Http\Resources\Overlay;
use App\Device;
use App\Http\Resources\OverviewCollection;
use App\Http\Resources\LectureResource;
use App\Lecture;

class ApiController extends Controller
{
    //


    public function overview(){
        return new OverviewCollection(Hall::all());
    }

    public function overlay($id){
        return new Overlay(Device::find($id));
    }

    public function overlays(){
        return new OverlayCollection(Device::all());
    }

    public function lectures(){
        return LectureResource::collection(Lecture::all());
    }

}
