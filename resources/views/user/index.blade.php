@extends('layouts.control') 
@section('side')
<users-list inline-template>
    <div class="box">
        <div class="columns">
            <div class="column is-6">
                    <div class="field">
                    <input type="text" class="input" v-model="search" @keyup="filter" placeholder="Search Room, IP">
                </div>
            </div>
        </div>
        <table class="table is-fullwidth">
            <tr>
                <th>Name</th>
                <th>Email</th>
                <th>EmpID</th>
                <th>Role</th>
                <th>Action</th>
            </tr>
            <tr v-for="user in filtered">
                <td>@{{user.name}}</td>
                <td>@{{user.email}}</td>
                <td>@{{user.uid}}</td>
                <td>@{{getRole(user.role)}}</td>
                <td>
                <a :href="'/user/' + user.id">Profile</a>
                </td>
            </tr>
        </table>
    </div>
</users-list>
@endsection