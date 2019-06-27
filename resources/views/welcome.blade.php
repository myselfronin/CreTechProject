@extends('layouts.master')

@section('content')
    <h1>Dashboard</h1>
    <div class="jumbotron">
        <div class="row">
            <div class="col-1"></div>
            <div class="col-6">
                <h2>Admin registration</h2>
                @include('form.admin')
            </div>
        </div>
    </div>