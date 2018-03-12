<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Maatwebsite\Excel\Facades\Excel;
use App\User;
use App\Device;
use Carbon\Carbon;
use App\Lecture;

class FeederController extends Controller
{
    //



    public function index()
    {


        return view('feeder.index');
    }

    public function feed()
    {

        $rows = Excel::load('excel/schedule.xlsx', function ($reader) {
        })->get();

        Lecture::truncate();
        $rows = $rows->toArray();

        $skipped = [];

        $added = [];

        foreach ($rows as $row) {

            $final_course = $row['crs_l_name'];
            $final_hall;
            $final_user;
            $final_start = null;
            $final_end = null;
            $days = [];

            $errors = [];


            $final_hall = Device::where('room', $row['room_no'])->first();
            $final_user = User::where('uid', $row['emp_no'])->first();

            if($final_hall == null)
                $errors[] = 'Hall ' . $row['room_no'] . ' not found';

            if($final_user == null)
                $errors[] = 'No instructor found with EmpID ' . $row['emp_no'];
            
            if (count($errors) > 0) {
                $skipped[] = [
                    'lecture' => $row,
                    'errors'  => $errors,
                ];
                continue;
            }


            if ($row['sunday_start'] != ' ') {
                if ($final_start == null) {
                    $final_start = $row['sunday_start'];
                    $final_end = $row['sunday_end'];
                }
                $days[] = 0;
            }

            if ($row['monday_start'] != ' ') {
                if ($final_start == null) {
                    $final_start = $row['monday_start'];
                    $final_end = $row['monday_end'];
                }
                $days[] = 1;
            }

            if ($row['tuesday_start'] != ' ') {
                if ($final_start == null) {
                    $final_start = $row['tuesday_start'];
                    $final_end = $row['tuesday_end'];
                }
                $days[] = 2;
            }

            if ($row['wednesday_start'] != ' ') {
                if ($final_start == null) {
                    $final_start = $row['wednesday_start'];
                    $final_end = $row['wednesday_end'];
                }
                $days[] = 3;
            }

            if ($row['thursday_start'] != ' ') {
                if ($final_start == null) {
                    $final_start = $row['thursday_start'];
                    $final_end = $row['thursday_end'];
                }
                $days[] = 4;
            }
            $lecture = Lecture::create([
                'course' => $final_course,
                'start' => Carbon::parse(str_replace(' ', '', $final_start))->format('H:i:s'),
                'end' => Carbon::parse(str_replace(' ', '', $final_end))->format('H:i:s'),
                'user_id' => $final_user->id,
                'hall_id' => $final_hall->deviceable->id,
                'days' => $days,

            ]);

            $added[] = $lecture;

        }


        return redirect(route('feeder.index'))->with(
            [
                'skipped' => $skipped, 
                'added'   => $added,
            ]
        );
    }

}
