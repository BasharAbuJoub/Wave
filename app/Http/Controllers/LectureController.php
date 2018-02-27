<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Lecture;

class LectureController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //

        return view('lecture.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

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
    public function edit($id)
    {
        //


        return view('lecture.edit', ['lecture' => Lecture::find($id)]);
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

        $this->validate($request, [
            'office_id' => 'required|int',
            'hall_id'   => 'required|int',
            'start'  => 'required|date_format:H:i:s',
            'end'  => 'required|date_format:H:i:s',
            'course' => 'required',
            'days'  => 'required|array'  
        ]);

        Lecture::find($id)->update([
            'office_id' => $request->office_id,
            'hall_id'      => $request->hall_id,
            'start'     => $request->start,
            'end'       => $request->end,
            'course'    => $request->course,
            'days'      => $request->days
        ]);

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
    }
}
