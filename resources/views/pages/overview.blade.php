@extends('layouts.app')

@section('content')

    <subheader icon="ion-ios-analytics-outline"
        title="Welcome to Wave"
        body="Faculty of information technology LCD control system"
        ></subheader>


    <div class="container is-fluid">
        <div class="card">
            <header class="card-header">
                <p class="card-header-title">
                Overview
                </p>
            </header>
            <div class="card-content">
                <overview-table></overview-table>
            </div>
        </div>
    </div>
    
@endsection