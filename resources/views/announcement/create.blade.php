@extends('layouts.control') 
@section('side')
<create-announcement :lecture="{{$lecture}}" inline-template>
    <div class="columns">
        <div class="column is-6 is-offset-3">
            <div class="box">
            <p>Lecture : @{{lecture.course}} - @{{lecture.instructor}} - @{{lecture.start}}</p>
            <br>

                <form action="{{route('announcements.store')}}" method="post">
                    <b-field>
                        <b-radio-button v-model="type" native-value="0" type="is-info">
                            <span>Cancel</span>
                        </b-radio-button>
                        <b-radio-button v-model="type" native-value="1" type="is-info">
                            <span>Delay</span>
                        </b-radio-button>
                    </b-field>
                    <div class="field">
                        <label class="label">Lectures</label>
                        <input class="input" type="number" placeholder="0">
                    </div>
                    <div class="field">
                        <label class="label">Note</label>
                        <input type="text" class="input" v-model="note" placeholder="Announcement note" required>
                    </div>
                    <div class="field">
                        <input type="submit" class="button is-success" value="Create" @click.prevent="create">
                    </div>

                </form>
            </div>
        </div>
    </div>
</create-announcement>
@endsection