@extends('layouts.control')

@section('side')
<broadcast-table api="{{$api}}" create="{{$create}}" inline-template>
        <div class="box">
            <table class="table is-fullwidth">
                <tr>
                    <th>Line1</th>
                    <th>Line2</th>
                    <th>Start</th>
                    <th>End</th>
                    <th>Devices</th>
                    <th>Action</th>
                </tr>
                <tr v-for="broadcast in broadcasts">
                    <td>@{{broadcast.line1}}</td>
                <td>@{{broadcast.line2}}</td>
                <td>@{{broadcast.start}}</td>
                <td>@{{broadcast.end}}</td>
                <td>
                    <span v-for="device in broadcast.devices">
                        @{{device.room}}
                    </span>
                </td>
                <td></td>
                </tr>
            </table>
        </div>
    </broadcast-table>
@endsection