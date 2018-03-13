@extends('layouts.control')


@section('side')

    <change-pass inline-template>

        <div class="columns">
            <div class="column is-6 is-offset-3">

                <div class="box">

                    <div class="field">
                        <label class="label">Old Password</label>
                        <input type="password" class="input" v-model="oldPass">
                    </div>

                    <div class="field">
                        <label class="label">New Password</label>
                        <input type="password" class="input" v-model="newPass">
                    </div>

                    <div class="field">
                        <label class="label">Repeat New Password</label>
                        <input type="password" class="input" v-model="newPassConfirmation">
                    </div>

                    <button class="button is-success" @click.prevent="change">Change</button>


                </div>

            </div>
        </div>

    </change-pass>

@endsection