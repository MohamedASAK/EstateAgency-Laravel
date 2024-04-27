@extends('layouts.app')

@section('MainTitle')
    List All Admins
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
            <th>Name</th>
            <th>Email</th>
            <th colspan="3">Action</th>
        </tr>
        @forelse ($adminsData as $item)
            <tr>
                <th>{{$loop->iteration}}</th>
                <th>{{$item->name}}</th>
                <th>{{$item->email}}</th>
                <th><a href="{{route('admin.show', $item->id)}}"><i class="text-info fa-solid fa-eye"></i></a></th>
                <th><a href="{{route('admin.edit', $item->id)}}"><i class="text-warning fa-solid fa-pen-to-square"></i></a></th>
                <th><a href="{{route('admin.destroy', $item->id)}}"></a><i class="text-danger fa-solid fa-trash-can"></i></th>
            </tr>
        @empty
            <h1>There Is No Data To Show</h1>
        @endforelse
    </table>
    {{$adminsData->links('pagination::bootstrap-5')}}
@endsection
