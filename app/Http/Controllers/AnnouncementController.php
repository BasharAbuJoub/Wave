<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Lecture;
use App\Announcement;

class AnnouncementController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($lecture)
    {
        //

        return view('announcement.create', ['lecture'=> Lecture::find($lecture)]);
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

        //
        $this->validate($request, [
            'note' => 'required',
            'type' => 'required|int',
            'count'=> 'required|int',
        ]);
        $anc = Lecture::find($request->id)->addAnnouncement($request->count, $request->type, $request->note);
        return response($anc, 200);
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
    
        return View('announcement.edit', [
            'anc' => Announcement::find($id),
            'lecture' => Announcement::find($id)->lecture,
        ]);
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
            'note' => 'required',
            'type' => 'required|boolean',
        ]);

        Announcement::find($id)->update([
            'note' => $request->note,
            'type' => $request->type,
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
        Announcement::find($id)->delete();
        return response(route('lectures.index'), 200);
    }
}
