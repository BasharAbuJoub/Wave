<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Lecture;
use Illuminate\Support\Facades\Auth;
use App\Http\Resources\LectureResource;
use Carbon\Carbon;

class LectureController extends Controller
{

    public function __construct()
    {
        $this->middleware(['instructor']);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        if(!Auth::user()->isAdmin())
            abort(401);
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
        if(!Auth::user()->isAdmin())
            abort(401);
        return view('lecture.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        if(!Auth::user()->isAdmin())
            abort(401);
        $this->validate($request, [
            'course'    => 'required',
            'hall_id'   => 'required|exists:halls,id',
            'user_id'   => 'required|exists:users,id',
            'start'     => 'required',
            'end'       => 'required',
            'days'      => 'required|array'

        ]);
        Lecture::create($request->all());
        return response(route('lectures.index'));
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
        if(!Auth::user()->isAdmin())
            abort(401);

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

        if(!Auth::user()->isAdmin())
            abort(401);
        $this->validate($request, [
            'user_id' => 'required|int',
            'hall_id'   => 'required|int',
            'start'  => 'required',
            'end'  => 'required',
            'course' => 'required',
            'days'  => 'required|array'  
        ]);

        Lecture::find($id)->update([
            'user_id' => $request->user_id,
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
        if(!Auth::user()->isAdmin())
            abort(401);
        Lecture::find($id)->delete();
        return response('Destroyed');
    }


    public function myLectures(){
        return view('lecture.my');
    }

    public function myLecturesJson(){
        return LectureResource::collection(Auth::user()->lectures);
    }

}
