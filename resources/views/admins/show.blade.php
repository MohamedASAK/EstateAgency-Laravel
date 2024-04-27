@extends('layouts.app')

@section('MainTitle')
    Show Admin Data For {{$admin->name}}
@endsection

@section('Content')
<div class="card p-5">
    <div class="card-body text-center">
        <img src="{{asset("upload/$admin->image")}}" class="img w-25" alt="">
    </div>
    <div class="card-body">
        <hr>
        <h5>Name : {{$admin->name}}</h5>
        <hr>
        <h5>Email : {{$admin->email}}</h5>
        <hr>
        <h5>Phone : {{$admin->phone}}</h5>
        <hr>
        <h5>Address : {{$admin->address}}</h5>
        <hr>
        <h5>National ID : {{$admin->nid}}</h5>
        <hr>
        <h5>Salary : {{$admin->salary}}</h5>
        <hr>
        <h5>Rule : {{$admin->rule}}</h5>
    </div>
</div>
@endsection
