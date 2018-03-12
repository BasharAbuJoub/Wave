<?php

namespace App\Http\Controllers;

use App\Settings;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use App\User;
use App\Device;
use Carbon\Carbon;
use App\Lecture;

class SettingsController extends Controller
{

    public function __construct()
    {
        $this->middleware(['admin']);
    }

    /**
     * 
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('settings.index', ['settings' => Settings::all()]);
    }


    public function feed(){
        
        $rows = Excel::load('excel/schedule.xlsx', function($reader){})->get();

        Lecture::truncate();
        $rows = $rows->toArray();

        $skipped = [];

        $added = [];

        foreach($rows as $row){

            $final_course = $row['crs_l_name'];
            $final_hall;
            $final_user;
            $final_start = null;
            $final_end = null;
            $days = [];
            
            try{
                $final_hall = Device::where('room', $row['room_no'])->first();
                $final_user = User::where('uid', $row['emp_no'])->first(); 
                if($final_hall == null || $final_user == null){
                    array_push($skipped, $row);
                    continue;  
                }


            }catch(\ErrorException $e){
                array_push($skipped, $row);
                continue;
            }


            if($row['sunday_start'] != ' '){
                if($final_start == null){
                    $final_start = $row['sunday_start'];
                    $final_end = $row['sunday_end'];
                }
                $days[] = 0;
            }

            if($row['monday_start'] != ' '){
                if($final_start == null){
                    $final_start = $row['monday_start'];
                    $final_end = $row['monday_end'];
                }
                $days[] = 1;
            }

            if($row['tuesday_start'] != ' '){
                if($final_start == null){
                    $final_start = $row['tuesday_start'];
                    $final_end = $row['tuesday_end'];
                }
                $days[] = 2;
            }

            if($row['wednesday_start'] != ' '){
                if($final_start == null){
                    $final_start = $row['wednesday_start'];
                    $final_end = $row['wednesday_end'];
                }
                $days[] = 3;
            }

            if($row['thursday_start'] != ' '){
                if($final_start == null){
                    $final_start = $row['thursday_start'];
                    $final_end = $row['thursday_end'];
                }
                $days[] = 4;
            }
            $lecture = Lecture::create([
                'course'    => $final_course,
                'start'     => Carbon::parse(str_replace(' ', '', $final_start))->format('H:i:s'),
                'end'       => Carbon::parse(str_replace(' ', '', $final_end))->format('H:i:s'),
                'user_id'   => $final_user->id,
                'hall_id'   => $final_hall->deviceable->id,
                'days'      => $days,

            ]);

            array_push($added, $lecture);
     
        }

        return json_encode($added);
        
    }

    public function save(Request $request){
        foreach($request->settings as $setting){
            Settings::set($setting['key'], $setting['value']);
        }
        return response('Saved');
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Settings  $settings
     * @return \Illuminate\Http\Response
     */
    public function show(Settings $settings)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Settings  $settings
     * @return \Illuminate\Http\Response
     */
    public function edit(Settings $settings)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Settings  $settings
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Settings $settings)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Settings  $settings
     * @return \Illuminate\Http\Response
     */
    public function destroy(Settings $settings)
    {
        //
    }
}
