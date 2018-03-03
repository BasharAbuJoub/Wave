@extends('layouts.control') 
@section('side')
<settings :settings="{{$settings}}" inline-template>
    <div class="columns">
        <div class="column is-8 is-offset-2">
            <div class="box">
                <h2 class="title is-2"><icon name="ion-ios-gear-outline" size="42"></icon> Settings</h2>
                <hr>
                <table class="table is-fullwidth is-bordered">
                    <tr v-for="setting in settingsList">
                        <td><strong>@{{setting.key}}:</strong></td>
                        <td>
                            <div class="filed">
                                <input type="text" class="input is-small" v-model="setting.value">
                            </div>
                        </td>
                    </tr>
                </table>
                <div class="field">
                    <button class="button is-success" @click.prevent="save">Save</button>
                </div>
            </div>
        </div>
    </div>
</settings>
@endsection