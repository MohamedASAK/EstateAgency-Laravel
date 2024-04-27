@extends('layouts.app')

@section('MainTitle')
    Show Message Data For {{$message->name}}
@endsection

@section('Content')
<div class="card p-5">
    <div class="card-body text-center">
        <img src="{{asset("upload/$message->image")}}" class="img w-25" alt="">
    </div>
    <div class="card-body">
        <hr>
        <h5>User ID : {{$message->userId}}</h5>
        <hr>
        <h5>Message : {{$message->message}}</h5>
        <hr>
        <h5>Answer : {{$message->answer}}</h5>
    </div>
</div>
@endsection
