@extends('layouts.app')

@section('MainTitle')
    Show Developer Data For {{$developer->name}}
@endsection

@section('Content')
<div class="card p-5">
    <div class="card-body text-center">
        <img src="{{asset("upload/$developer->image")}}" class="img w-25" alt="">
    </div>
    <div class="card-body">
        <hr>
        <h5>Name : {{$developer->name}}</h5>
        <hr>
        <h5>Email : {{$developer->email}}</h5>
        <hr>
        <h5>Phone : {{$developer->phone}}</h5>
        <hr>
        <h5>Address : {{$developer->address}}</h5>
        <hr>
    </div>
</div>
@endsection
