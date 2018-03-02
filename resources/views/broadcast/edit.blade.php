@extends('layouts.control')

@section('side')

<edit-broadcast :broadcast="{{$broadcast}}" inline-template>

        <div class="columns">
            <div class="column is-8 is-offset-2">
                <div class="box">


                    <div class="field" style="margin: 30px 0;">
                        <div class="block">
                            <b-checkbox v-for="hall in halls" v-model="devices"
                                :native-value="hall.id">
                                @{{hall.room}}
                            </b-checkbox>
                        </div>
                    </div>

                    <div class="block">
                        <b-checkbox v-model="all" @input="selectAll">
                            Check All
                        </b-checkbox>
                    </div>


                    <div class="field">
                        <label class="label">Line One</label>
                        <input type="text" class="input" v-model="line1" placeholder="Line 1">
                    </div>

                    <div class="field">
                        <label class="label">Line Two</label>
                        <input type="text" class="input" v-model="line2" placeholder="Line 2">
                    </div>


                    <div class="columns">
                        <b-field class="column" label="Select start">
                            <b-timepicker v-model="start" inline></b-timepicker>
                        </b-field>
                        <b-field class="column" label="Select end">
                            <b-timepicker v-model="end" size="is-small" inline></b-timepicker>
                        </b-field>
                    </div>

                    <button class="button is-success" @click.prevent="update">Save</button>
                    


                </div>
            </div>
        </div>

    </edit-broadcast>
    
@endsection