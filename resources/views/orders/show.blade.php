@extends('layouts.app')

@section('MainTitle')
    Show Order Data For {{$order->message}}
@endsection

@section('Content')
<div class="card p-5">
    <div class="card-body">
        <hr>
        <h5>Amount : {{$order->amount}}</h5>
        <hr>
        <h5>Message : {{$order->message}}</h5>
        <hr>
        <h5>User ID : {{$order->userId}}</h5>
        <hr>
        <h5>Property ID : {{$order->propertyId}}</h5>
    </div>
</div>
@endsection
