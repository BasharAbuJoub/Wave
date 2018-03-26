@extends('layouts.control') 
@section('side')
<users-list inline-template>
    <div class="box">

        <table class="table">
            <tr>
                <th>Name</th>
                <th>Email</th>
                <th>EmpID</th>
                <th>Role</th>
                <th>Action</th>
            </tr>
            <tr v-for="user in users">
                <td>@{{user.name}}</td>
                <td>@{{user.email}}</td>
                <td>@{{user.uid}}</td>
                <td>@{{user.role}}</td>
                <td>
                    <a href="button is-small is-info">Profile</a>
                </td>
            </tr>
        </table>
    </div>
</users-list>
@endsection