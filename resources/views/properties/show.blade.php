@extends('layouts.app')

@section('MainTitle')
    Show Property Data For {{$property->name}}
@endsection

@section('Content')
<div class="card p-5">
    <div class="card-body text-center">
        <img src="{{asset("upload/$property->image")}}" class="img w-25" alt="">
    </div>
    <div class="card-body">
        <hr>
        <h5>Title : {{$property->title}}</h5>
        <hr>
        <h5>Description : {{$property->description}}</h5>
        <hr>
        <h5>Price : {{$property->price}}</h5>
        <hr>
        <h5>location : {{$property->location}}</h5>
        <hr>
        <h5>developer : {{$property->developer}}</h5>
        <hr>
        <h5>Agent: {{$property->agent}}</h5>
    </div>
</div>
@endsection
