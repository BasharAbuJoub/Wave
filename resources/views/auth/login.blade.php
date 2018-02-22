@extends('layouts.app')

@section('content')

    <div class="container" style="padding-top: 50px;">
        <div class="columns">

            <div class="column is-6 is-offset-3">
                <div class="box">
                    <div class="title">
                        <icon name="ion-log-in" size="30"></icon>
                        Login
                    </div>
                    <hr>
                    
                    @if (count($errors))
                    <article class="message is-danger">
                            <div class="message-body">
                                {{$errors->first()}}
                            </div>
                    </article>
                    @endif

                    <form action="{{route('login')}}" method="post">
                        @csrf
                        <div class="field">
                            <label class="label">Email</label>
                            <div class="control">
                                <input class="input" name="email" type="email" placeholder="example.gmail.com">
                            </div>
                        </div>
                        <div class="field">
                            <label class="label">Password</label>
                            <div class="control">
                                <input class="input" name="password" type="password" placeholder="Password">
                            </div>
                        </div>   
                        
                        <div class="field">
                            <b-checkbox name="remember">Remember Me</b-checkbox>
                        </div>

                        <div class="field">
                            <input type="submit" class="button is-primary" value="Login">
                        </div>

                    </form>
                </div>
            </div>

        </div>
    </div>

@endsection
