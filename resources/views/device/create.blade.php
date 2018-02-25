@extends('layouts.control') 
@section('side')
<create-device inline-template>
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
                    <div class="field">
                        <label class="label">Type</label>
                        <b-field>
                            <b-radio-button v-model="type" native-value="0" type="is-info">
                                <span>Hall</span>
                            </b-radio-button>
                            <b-radio-button v-model="type" native-value="1" type="is-info">
                                <span>Office</span>
                            </b-radio-button>
                        </b-field>
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
                        <input type="submit" class="button is-success" value="Create" @click.prevent="create">
                    </div>

                </form>
            </div>
        </div>
    </div>
</create-device>
@endsection