@extends('layouts.control')

@section('side')

<edit-announcement :lecture="{{$lecture}}" :anc="{{$anc}}" inline-template>

    <div class="columns">
        <div class="column is-6 is-offset-3">

            <div class="box">

                <table class="table is-fullwidth">
                    <tr>
                        <td>Lecture:</td>
                        <td>{{$lecture->course}}</td>
                    </tr>
                    <tr>
                        <td>Start:</td>
                        <td>{{$lecture->start}}</td>
                    </tr>
                    <tr>
                        <td>Instructor:</td>
                        <td>{{$lecture->instructor}}</td>
                    </tr>
                    <tr>
                        <td>Anc End :</td>
                        <td>{{$anc->until}}</td>
                    </tr>

                </table>
                
                <div class="field">
                    <label class="label">Note</label>
                    <input type="text" class="input" placeholder="Note" v-model="note">
                </div>

                <b-field>
                    <b-radio-button v-model="type" native-value="0" type="is-info">
                        <span>Cancel</span>
                    </b-radio-button>
                    <b-radio-button v-model="type" native-value="1" type="is-info">
                        <span>Delay</span>
                    </b-radio-button>
                </b-field>

                <hr>
                <button class="button is-success" @click.prevent="update">Save</button>
                <button class="button is-danger" @click.prevent="remove">Delete</button>
                <a href="{{route('lectures.index')}}" class="button is-info is-pulled-right">Back</a>
            </div>

        </div>
    </div>

</edit-announcement>

@endsection