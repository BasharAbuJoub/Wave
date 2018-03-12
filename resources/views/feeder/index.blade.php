@extends('layouts.control') 
@section('side')
<div class="box has-text-centered">
    <p>To feed the database with excel sheet data click the button below</p>
    <p>Note that there must be (xlsx) file located in [/public/excel/schedule.xlsx]</p>
    <br>
    <a href="{{route('feeder.feed')}}" class="button is-info">Feed</a>
</div>
@if( session('added') != null || session('skipped') != null)
<div class="box">
    <p class="is-size-4">Added <span class="has-text-success">{{count(session('added'))}}</span> lectures.</p>
    <p class="is-size-4">Skipped <span class="has-text-danger">{{count(session('skipped'))}}</span> lectures.</p>
    <hr>
    <table class="table is-fullwidth">
        <tr>
            <th>Course</th>
            <th>EmpID</th>
            <th>Room</th>
            <th>Reason</th>
        </tr>
        @foreach(session('skipped') as $lecture)
        <tr>
            <td>{{$lecture['lecture']['crs_l_name']}} - Section {{$lecture['lecture']['class_no']}}</td>
            <td>{{$lecture['lecture']['emp_no']}}</td>
            <td>{{$lecture['lecture']['room_no']}}</td>
            <td>{{implode(',',  $lecture['errors'])}}</td>
        </tr>
        @endforeach
    </table>
</div>
@endif
@endsection