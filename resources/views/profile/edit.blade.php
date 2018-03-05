@extends('layouts.control')

@section('side')

<edit-profile :originaluser="{{$user}}" inline-template>
       
        <div class="columns">
            <div class="column is-6 is-offset-3">
                <div class="box">
                    <div class="field">
                        <label class="label">Name</label>
                        <input type="text" class="input" v-model="user.name">
                    </div>
    
                    <div class="field">
                        <label class="label">Bio</label>
                        <input type="text" class="input" v-model="user.bio">
                    </div>
    
                    <button class="button is-success" @click.prevent="save">Save</button>
    
                </div>

            </div>
        </div>
    </edit-profile>

@endsection