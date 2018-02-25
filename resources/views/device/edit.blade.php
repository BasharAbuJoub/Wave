@extends('layouts.control') 
@section('side')
<edit-device :device="{{$device}}" inline-template>
    <div class="columns">
        <div class="column is-6 is-offset-3">
            <div class="box">
                <form action="{{route('devices.store')}}" method="post">
                    <div class="field">
                        <label class="label">Room</label>
                        <input type="text" class="input" v-model="room" placeholder="Room">
                    </div>
                    <div class="field">
                        <label class="label">IP</label>
                        <input type="text" class="input" v-model="ip" placeholder="IP" required>
                    </div>
                    <div v-show="type == '1'" class="field">
                        <div class="field">
                            <label class="label">Instructor</label>
                            <input type="text" class="input" v-model="instructor" placeholder="Instructor name">
                        </div>
                        <div class="field">
                            <label class="label">Bio (optional)</label>
                            <input type="text" class="input" v-model="bio" placeholder="Biology">
                        </div>
                    </div>
                    <div class="field">
                        <input type="submit" class="button is-success" value="Save" @click.prevent="update">
                        <a class="button is-info is-pulled-right" href="{{route('devices.index')}}">Back</a>
                    </div>

                </form>
            </div>
        </div>
    </div>
</edit-device>
@endsection