@extends('layouts.app') 
@section('content')
<subheader icon="ion-ios-analytics-outline" title="Welcome to Wave" body="Faculty of information technology LCD control system"></subheader>
<div class="container is-fluid" style="margin-top: 50px;">
    <div class="columns">
        <div class="column is-3">
            <div class="box">
                <aside class="menu">
                    <p class="menu-label">
                        General
                    </p>
                    <ul class="menu-list">
                        <li>
                            <a href="{{url('/')}}" class="{{Active::route('home')}}">
                                <icon name="ion-ios-analytics-outline" class="m-icon" size="24"></icon>Overview</a>
                        </li>
                        @if(Auth::user()->isAdmin())
                        <li>
                            <a href="{{route('lobby')}}" class="{{Active::route('lobby')}}">
                                <icon name="ion-ios-world-outline" class="m-icon" size="24"></icon>Lobby</a>
                        </li>
                        <li>
                            <a href="{{route('settings.index')}}" class="{{Active::route('settings.index')}}">
                                <icon name="ion-ios-gear-outline" class="m-icon" size="24"></icon>Settings</a>
                        </li>
                        <li>
                            <a href="{{route('feeder.index')}}" class="{{Active::route('feeder.*')}}">
                                <icon name="ion-ios-flame-outline" class="m-icon" size="24"></icon>Feeder</a>
                        </li>
                        @endif
                    </ul>
                    @if(Auth::user()->isAdmin())
                    <p class="menu-label">
                        Data
                    </p>
                    <ul class="menu-list">

                        <li>
                            <a href="{{route('lectures.index')}}" class="{{Active::route('lectures.*')}} {{Active::route('announcements.*')}}">
                                <icon name="ion-ios-calendar-outline" class="m-icon" size="24"></icon>Lectures</a>
                        </li>
                        <li>
                            <a href="{{route('devices.index')}}" class="{{Active::route('devices.*')}}">
                                <icon name="ion-ios-pulse" class="m-icon" size="24"></icon>Devices</a>
                        </li>
                        <li>
                            <a href="{{route('broadcasts.index')}}" class="{{Active::route('broadcasts.*')}}">
                                <icon name="ion-ios-mic-outline" class="m-icon" size="24"></icon>Broadcast</a>
                        </li>
                    </ul>
                    @endif
                    <p class="menu-label">
                        User
                    </p>
                    <ul class="menu-list">
                        <li>
                            <a href="{{route('my.lectures')}}" class="{{Active::route('my.lectures')}} {{Active::route('announcements.*')}}">
                            <icon name="ion-ios-calendar-outline" class="m-icon" size="24"></icon>My Lectures</a>
                        </li>
                        <li>
                            <a href="{{route('profile')}}" class="{{Active::route('profile')}}">
                            <icon name="ion-ios-person-outline" class="m-icon" size="24"></icon>Profile</a>
                        </li>

                        <li>
                            <a href="{{route('changepassword.index')}}" class="{{Active::route('changepassword.index')}}">
                            <icon name="ion-ios-eye-outline" class="m-icon" size="24"></icon>Password</a>
                        </li>

                        <li>
                        <a href="{{url('logout')}}">
                                <icon name="ion-ios-redo-outline" class="m-icon" size="24"></icon>Logout</a>
                        </li>
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