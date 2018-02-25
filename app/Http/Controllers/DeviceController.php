<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Device;
use App\Office;
use App\Hall;

class DeviceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return view('device.index', ['devices'=> Device::all()]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
     
        return view('device.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $this->validate($request, [
            'room'  => 'required',
            'ip'    => 'required|ipv4',
            'type'  => 'required|boolean',
        ]);
        if($request->type == '1'){
            $this->validate($request, [
                'instructor' => 'required'
            ]);
        }

        if($request->type == '0'){
            Hall::create()->device()->create([
                'room' => $request->room,
                'ip'   => $request->ip,
            ]);
        }else{
            Office::create([
                'instructor'    => $request->instructor,
                'bio'           => $request->bio != null ? $request->bio : ''
            ])->device()->create([
                'room' => $request->room,
                'ip'   => $request->ip,
            ]);
        }

        return 'Device created';
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($device)
    {
        $device = Device::with('deviceable')->find($device);
        return view('device.edit')->with(compact('device'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $device = Device::find($id);
        
        $this->validate($request, [
            'room'  => 'required',
            'ip'    => 'required|ipv4',
        ]);
        if($request->type == '1'){
            $this->validate($request, [
                'instructor' => 'required'
            ]);
        }
    

        $device->update([
            'room' => $request->room,
            'ip'   => $request->ip
        ]);
        if($device->deviceable_type != 'App\Hall'){
            $device->deviceable->update([
                'instructor' => $request->instructor,
                'bio'        => $request->bio
            ]);
        }

        return response('Updated', 200);
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        Device::find($id)->delete();
        return response('Deleted.', 200);
    }
}
