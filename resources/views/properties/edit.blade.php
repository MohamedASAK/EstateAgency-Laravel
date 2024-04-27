@extends('layouts.app')

@section('MainTitle')
Edit Property Data For {{$property->name}}
@endsection

@section('Content')
<section class="section">
<div class="row conatiner-fluid">
    @if (Session::has("done"))
        <div class="alert alert-success">
            {{Session::get("done")}}
        </div>
    @endif
    <div class="col-12 ">
        <div class="card p-3">
            <div class="card-body">
                <!-- Vertical Form -->
                <form action="{{route('property.updata',$property->id)}}" method="POST" enctype="multipart/form-data" class="row g-3">
                    @csrf
                    <div class="col-12">
                        <label for="" class="form-label">Title</label>
                        <input type="text" class="form-control" value="{{$property->title}}" name="title" placeholder="Title">
                    </div>
                    <div class="col-12">
                        <label for="" class="form-label">Description</label>
                        <input type="text" class="form-control" value="{{$property->description}}" name="description" placeholder="Description">
                    </div>
                    <div class="col-12">
                        <label for="" class="form-label">Price</label>
                        <input type="password" class="form-control" name="price" placeholder="Price">
                    </div>
                    <div class="col-12">
                        <label for="" class="form-label">Phone</label>
                        <input type="text" class="form-control" value="{{$property->phone}}" name="phone" placeholder="Phone">
                    </div>
                    <div class="col-12">
                        <label for="" class="form-label">Location</label>
                        <input type="text" class="form-control" value="{{$property->location}}" name="location" placeholder="Location">
                    </div>
                    <div class="col-12">
                        <label for="" class="form-label">Image</label>
                        <img src="{{asset("upload/$property->image")}}" width="40" alt="">
                        <input type="file" class="form-control" name="image" placeholder="Image">
                    </div>
                    <div class="col-12">
                        <select name="admin" class="form-control">
                            <option value="{{$property->admin}}" selected>{{$property->admin}}</option>
                            @foreach ($adminsData as $item)
                            <option value="{{$item->id}}">{{$item->name}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-12">
                        <select name="agent" class="form-control">
                            <option value="{{$property->agent}}" selected>{{$property->agent}}</option>
                            @foreach ($agentsData as $item)
                            <option value="{{$item->id}}">{{$item->name}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-12">
                        <select name="developer" class="form-control">
                            <option value="{{$property->developer}}" selected>{{$property->developer}}</option>
                            @foreach ($developersData as $item)
                                <option value="{{$item->id}}">{{$item->name}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="text-center">
                    <button type="submit" name="send" class="btn btn-primary">Submit</button>
                    <button type="reset" class="btn btn-secondary">Reset</button>
                    </div>
                </form><!-- Vertical Form -->
            </div>
        </div>
    </div>
</div>
</section>


@endsection
