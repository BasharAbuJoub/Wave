@extends('layouts.app') 


@section('content')
<div class="container is-fluid" style="margin-top: 50px;">
    <div class="columns">
        <div class="column is-3">
            <aside class="menu">
                <p class="menu-label">
                    General
                </p>
                <ul class="menu-list">
                    <li><a>Overview</a></li>
                    <li><a class="is-active">Lobby</a></li>
                    <li><a>Announcement</a></li>
                    <li><a>Settings</a></li>
                </ul>
                <p class="menu-label">
                    Data
                </p>
                <ul class="menu-list">
                    <li><a>Devices</a></li>
                    <li><a>Lectures</a></li>
                    <li><a><icon name="ion-ios-mic-outline" size="24"></icon>Broadcast</a></li>
                </ul>
                <p class="menu-label">
                    User
                </p>
                <ul class="menu-list">
                    <li><a>Password</a></li>
                    <li><a>Logout</a></li>
                </ul>
            </aside>
        </div>
        <div class="column">
            @yield('side')
        </div>
    </div>
</div>
@endsection