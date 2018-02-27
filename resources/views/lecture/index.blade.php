@extends('layouts.control')

@section('side')
    <lectures-table api="{{route('api.lectures')}}">

        

    </lectures-table>
@endsection