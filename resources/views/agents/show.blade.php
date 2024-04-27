@extends('layouts.app')

@section('MainTitle')
    Show Agent Data For {{$agent->name}}
@endsection

@section('Content')
<div class="card p-5">
    <div class="card-body text-center">
        <img src="{{asset("upload/$agent->image")}}" class="img w-25" alt="">
    </div>
    <div class="card-body">
        <hr>
        <h5>Name : {{$agent->name}}</h5>
        <hr>
        <h5>Email : {{$agent->email}}</h5>
        <hr>
        <h5>Phone : {{$agent->phone}}</h5>
        <hr>
        <h5>Address : {{$agent->address}}</h5>
        <hr>
        <h5>National ID : {{$agent->nid}}</h5>
        <hr>
        <h5>Salary : {{$agent->salary}}</h5>
    </div>
</div>
@endsection
