@extends('layouts.app') 
@section('content')
<register-form inline-template style="margin-top: 50px;">
    <div class="columns">
        <div class="column is-6 is-offset-3">
            <div class="box">

                <div class="field">
                    <label class="label">Name</label>
                    <input type="text" class="input" v-model="data.name" placeholder="Name">
                </div>
                
                <div class="feild">
                    <label class="label">Bio</label>
                    <input type="text" class="input" v-model="data.bio" placeholder="Bio">
                    <p class="help">The text will appear on the second line of the screen</p>
                </div>

                <div class="field">
                    <label class="label">Email</label>
                    <input type="text" class="input" v-model="data.email" placeholder="Email">
                </div>

                <div class="field">
                    <label class="label">Password</label>
                    <input type="password" class="input" v-model="data.password" placeholder="Password">
                </div>

                <div class="field">
                    <label class="label">Confirm Password</label>
                    <input type="password" class="input" v-model="data.confirm_password" placeholder="Repeat your password">
                </div>


                <button class="button is-success" @click.prevent="register">Register</button>

                
            </div>
        </div>
    </div>
</register-form>
@endsection