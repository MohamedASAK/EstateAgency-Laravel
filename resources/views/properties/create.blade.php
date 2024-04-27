@extends('layouts.app')

@section('MainTitle')
Create Property
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
                <form action="{{route('property.store')}}" method="POST" enctype="multipart/form-data" class="row g-3">
                    @csrf
                    <div class="col-12">
                        <label for="" class="form-label">Title</label>
                        <input type="text" class="form-control" name="name" placeholder="Name">
                    </div>
                    <div class="col-12">
                        <label for="" class="form-label">Description</label>
                        <input type="text" class="form-control" name="description" placeholder="Email">
                    </div>
                    <div class="col-12">
                        <label for="" class="form-label">Price</label>
                        <input type="text" class="form-control" name="price" placeholder="Password">
                    </div>
                    <div class="col-12">
                        <label for="" class="form-label">Location</label>
                        <input type="text" class="form-control" name="location" placeholder="Phone">
                    </div>
                    <div class="col-12">
                        <label for="" class="form-label">Image</label>
                        <input type="file" class="form-control" name="image" placeholder="Image">
                    </div>
                    <div class="col-12">
                        <select name="admin" class="form-control">
                            <option selected>Admin Name</option>
                            @foreach ($adminsData as $item)
                                <option value="{{$item->id}}">{{$item->name}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-12">
                        <select name="agent" class="form-control">
                            <option selected>Sales Name</option>
                            @foreach ($agentsData as $item)
                                <option value="{{$item->id}}">{{$item->name}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-12">
                        <select name="developer" class="form-control">
                            <option selected>Developer Name</option>
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
