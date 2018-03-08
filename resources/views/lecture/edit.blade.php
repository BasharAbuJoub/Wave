@extends('layouts.control') 
@section('side')
<edit-lecture :lecture="{{$lecture}}" inline-template>
    <div class="columns">
        <div class="column is-8 is-offset-2">
            <div class="box">
                <form action="{{route('lectures.store')}}" method="post">


                    <div class="field">
                        <label class="label">Course</label>
                        <input type="text" class="input" v-model="course" placeholder="Course">
                    </div>


                    <div class="field" style="margin: 30px 0;">
                        <div class="block">
                            <b-checkbox v-model="days"
                                native-value="0">
                                Sun
                            </b-checkbox>
                            <b-checkbox v-model="days"
                                native-value="1">
                                Mon
                            </b-checkbox>
                            <b-checkbox v-model="days"
                                native-value="2">
                                Tue
                            </b-checkbox>
                            <b-checkbox v-model="days"
                                native-value="3">
                                Wed
                            </b-checkbox>
                            <b-checkbox v-model="days"
                                native-value="4">
                                Thu
                            </b-checkbox>
                            <b-checkbox v-model="days"
                                native-value="5">
                                Fri
                            </b-checkbox>
                            <b-checkbox v-model="days"
                                native-value="6">
                                Sat
                            </b-checkbox>
                        </div>
                    </div>


                    <div class="columns">
                        <div class="column">
                            <b-field label="Hall">
                                <b-select placeholder="Select a hall"  v-model="hall">
                                    <option 
                                        v-for="hall in halls"
                                        :value="hall.id"
                                        >
                                        @{{ hall.room }}
                                    </option>
                                </b-select>
                            </b-field>
                        </div>
                        <div class="column">
                            <b-field label="Instructor">
                                <b-select placeholder="Select instructor" v-model="office">
                                    <option
                                        v-for="office in offices"
                                        :value="office.id"
                                        >
                                        @{{ office.instructor }}
                                    </option>
                                </b-select>
                            </b-field>
                        </div>
                    </div>



                    <div class="columns">
                        <b-field class="column" label="Select start">
                            <b-timepicker v-model="start" inline></b-timepicker>
                        </b-field>
                        <b-field class="column" label="Select end">
                            <b-timepicker v-model="end" size="is-small" inline></b-timepicker>
                        </b-field>
                    </div>

 

                    <div class="field">
                        <input type="submit" class="button is-success" value="Save" @click.prevent="update">
                        <a class="button is-info is-pulled-right" href="{{route('lectures.index')}}">Back</a>
                    </div> 

                </form>
            </div>
        </div>
    </div>
</edit-lecture>
@endsection