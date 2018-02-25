@extends('layouts.app') 
@section('content')
<div class="container is-fluid" style="margin-top: 50px;">
    <div class="columns">
        <div class="column is-3">
            <div class="box">
                <aside class="menu">
                    <p class="menu-label">
                        General
                    </p>
                    <ul class="menu-list">
                        <li><a><icon name="ion-ios-analytics-outline" class="m-icon" size="24"></icon>Overview</a></li>
                        <li><a class="is-active"><icon name="ion-ios-world-outline" class="m-icon" size="24"></icon>Lobby</a></li>
                        <li><a><icon name="ion-ios-bell-outline" class="m-icon" size="24"></icon>Announcement</a></li>
                        <li><a><icon name="ion-ios-gear-outline" class="m-icon" size="24"></icon>Settings</a></li>
                    </ul>
                    <p class="menu-label">
                        Data
                    </p>
                    <ul class="menu-list">
                        <li><a><icon name="ion-ios-pulse" class="m-icon" size="24"></icon>Devices</a></li>
                        <li>
                            <a><icon name="ion-ios-calendar-outline" class="m-icon" size="24"></icon>Lectures</a>
                        </li>
                        <li>
                            <a><icon name="ion-ios-mic-outline" class="m-icon" size="24"></icon>Broadcast</a>
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