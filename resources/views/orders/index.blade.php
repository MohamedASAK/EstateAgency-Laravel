@extends('layouts.app')

@section('MainTitle')
    List All Orders
@endsection

@section('Content')
    @if (Session::has("done"))
        <div class="alert alert-success">
            {{Session::get("done")}}
        </div>
    @endif
    <table class="table table-secondary">
        <tr>
            <th>#</th>
            <th>Message</th>
            <th colspan="3">Action</th>
        </tr>
        @forelse ($ordersData as $item)
            <tr>
                <th>{{$loop->iteration}}</th>
                <th>{{$item->message}}</th>
                <th><a href="{{route('order.show', $item->id)}}"><i class="text-info fa-solid fa-eye"></i></a></th>
                <th><a href="{{route('order.edit', $item->id)}}"><i class="text-warning fa-solid fa-pen-to-square"></i></a></th>
                <th><a href="{{route('order.destroy', $item->id)}}"></a><i class="text-danger fa-solid fa-trash-can"></i></th>
            </tr>
        @empty
            <h1>There Is No Data To Show</h1>
        @endforelse
    </table>
    {{$ordersData->links()}}
@endsection

