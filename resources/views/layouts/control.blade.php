@extends('layouts.app') 

@section('content')

<subheader icon="ion-ios-analytics-outline"
title="Welcome to Wave"
body="Faculty of information technology LCD control system"
></subheader>

<div class="container is-fluid" style="margin-top: 50px;">

    <div class="columns">
        <div class="column is-3">
            <div class="box">
                <aside class="menu">
                    <p class="menu-label">
                        General
                    </p>
                    <ul class="menu-list">
                    <li><a href="{{url('/')}}" class="{{Active::route('home')}}"><icon name="ion-ios-analytics-outline" class="m-icon" size="24"></icon>Overview</a></li>
                    <li><a href="{{route('lobby')}}" class="{{Active::route('lobby')}}"><icon name="ion-ios-world-outline" class="m-icon" size="24"></icon>Lobby</a></li>
                    <li><a href="{{route('settings')}}" class="{{Active::route('settings')}}"><icon name="ion-ios-gear-outline" class="m-icon" size="24"></icon>Settings</a></li>
                    </ul>
                    <p class="menu-label">
                        Data
                    </p>
                    <ul class="menu-list">
                    <li><a href="{{route('devices.index')}}" class="{{Active::route('devices.*')}}"><icon name="ion-ios-pulse" class="m-icon" size="24"></icon>Devices</a></li>
                        <li>
                        <a href="{{route('lectures.index')}}" class="{{Active::route('lectures.*')}} {{Active::route('announcements.*')}}"><icon name="ion-ios-calendar-outline" class="m-icon" size="24"></icon>Lectures</a>
                        </li>
                        <li>
                        <a href="{{route('broadcasts.index')}}" class="{{Active::route('broadcasts.*')}}" ><icon name="ion-ios-mic-outline" class="m-icon" size="24"></icon>Broadcast</a>
                        </li>
                    </ul>
                    <p class="menu-label">
                        User
                    </p>
                    <ul class="menu-list">
                        <li><a><icon name="ion-ios-eye-outline" class="m-icon" size="24"></icon>Password</a></li>
                        <li><a><icon name="ion-ios-redo-outline" class="m-icon" size="24"></icon>Logout</a></li>
                    </ul>
                </aside>
            </div>
        </div>
        <div class="column">
            @yield('side')
        </div>
    </div>
</div>
@endsection