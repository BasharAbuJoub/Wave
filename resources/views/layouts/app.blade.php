<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>
    <div id="app">
        
        
        <div class="hero is-info is-bold is-medium" style="background-image: url('{{asset('media/icons-background.svg')}}'); background-position: center;background-size:cover">
            {{--  Navbar  --}}
            <div class="hero-head">
                @include('layouts.navbar')    
            </div>           
        </div>

        @yield('content')


        <div class="container is-fluid has-text-centered">
            <br>
            <br>
            <hr>
            <p>Made with ❤️ by Bashar Abu Joub</p>
            <br>
        </div>

    </div>
    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}"></script>
    @stack('scripts')
</body>
</html>
