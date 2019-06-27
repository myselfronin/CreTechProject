@extends('layouts.master')

@section('content')
    <h1>Dashboard</h1>
    <div class="jumbotron">
        <div class="row">
            <div class="col-1"></div>
            <div class="col-5">
                <h2>Admin registration</h2>
                @include('form.user')
            </div>
            <div class="col-5">
                <h2>Role Create</h2>
                @include('form.role')
                <br>
                <ul>
                    @foreach($roles as $role)
                        <li>{{$role->role}}</li>
                    @endforeach
                </ul>


            </div>
        </div>
    </div>
    @endsection
