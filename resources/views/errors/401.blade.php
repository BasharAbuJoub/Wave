@extends('layouts.app')

@section('content')

    <div class="container">
        <div class="columns">
            <div class="column is-6 is-offset-3 has-text-centered box" style="margin-top: 10rem">
                <h1 class="title is-2">You don't have access !</h1>
                <a href="{{route('home')}}" class="button is-info">Go to Home</a>
            </div>
        </div>
    </div>

@endsection