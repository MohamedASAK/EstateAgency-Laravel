@extends('layouts.app')

@section('MainTitle')
    Show User Data For {{$user->name}}
@endsection

@section('Content')
<div class="card p-5">
    <div class="card-body text-center">
        <img src="{{asset("upload/$user->image")}}" class="img w-25" alt="">
    </div>
    <div class="card-body">
        <hr>
        <h5>Name : {{$user->name}}</h5>
        <hr>
        <h5>Email : {{$user->email}}</h5>
        <hr>
        <h5>Phone : {{$user->phone}}</h5>
        <hr>
        <h5>Address : {{$user->address}}</h5>
        <hr>
        <h5>National ID : {{$user->nid}}</h5>
    </div>
</div>
@endsection
