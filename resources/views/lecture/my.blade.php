@extends('layouts.control') 
@section('side')
<my-lectures inline-template>
    <div class="box">
        <div class="columns">
            <div class="field column is-6">
                <input type="text" class="input" placeholder="Search course/instructor/hall" v-model="search" @keyup="filter">
            </div>
        </div>
        <table class="table is-fullwidth">
            <tr>
                <th>Course</th>
                <th>Hall</th>
                <th>Start</th>
                <th>End</th>
                <th>Days</th>
                <th>Action</th>
            </tr>
            <tr v-for="lecture in filtered">
                <td>@{{lecture.course}}</td>
                <td>@{{lecture.hall}}</td>
                <td>@{{moment(lecture.start.date).format('HH:mm')}}</td>
                <td>@{{moment(lecture.end.date).format('HH:mm')}}</td>
                <td><span v-for="day in lecture.days">@{{moment().day(day).format('dd')}}. </span></td>
                <td>
                    <b-tooltip v-if="lecture.announcement" :label="lecture.announcement" position="is-top">
                        <a :href="lecture.anc_link_edit" class="button is-danger is-small">Anc</a>
                    </b-tooltip>
                    <a v-else :href="lecture.anc_link" class="button is-small">Anc</a>
                </td>
            </tr>
        </table>
    </div>
</my-lectures>
@endsection