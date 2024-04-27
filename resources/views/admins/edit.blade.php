@extends('layouts.app')

@section('MainTitle')
Edit Admin Data For {{$admin->name}}
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
                <form action="{{route('admin.updata',$admin->id)}}" method="POST" enctype="multipart/form-data" class="row g-3">
                    @csrf
                    <div class="col-12">
                        <label for="name" class="form-label">Name</label>
                        <input type="text" class="form-control" value="{{$admin->name}}" name="name" placeholder="Name">
                    </div>
                    <div class="col-12">
                        <label for="email" class="form-label">Email</label>
                        <input type="email" class="form-control" value="{{$admin->email}}" name="email" placeholder="Email">
                    </div>
                    <div class="col-12">
                        <label for="password" class="form-label">Password</label>
                        <input type="password" class="form-control" name="password" placeholder="Password">
                    </div>
                    <div class="col-12">
                        <label for="phone" class="form-label">Phone</label>
                        <input type="text" class="form-control" value="{{$admin->phone}}" name="phone" placeholder="Phone">
                    </div>
                    <div class="col-12">
                    <label for="address" class="form-label">Address</label>
                    <input type="text" class="form-control" value="{{$admin->adress}}" name="address" placeholder="Address">
                    </div>
                    <div class="col-12">
                        <label for="nid" class="form-label">National ID</label>
                        <input type="text" class="form-control" value="{{$admin->nid}}" name="nid" placeholder="National ID">
                    </div>
                    <div class="col-12">
                        <label for="image" class="form-label">Image</label>
                        <img src="{{asset("upload/$admin->image")}}" width="40" alt="">
                        <input type="file" class="form-control" name="image" placeholder="Image">
                    </div>
                    <div class="col-12">
                        <label for="salary" class="form-label">Salary</label>
                        <input type="number" class="form-control" value="{{$admin->salary}}" name="salary" placeholder="Salary">
                    </div>
                    <div class="col-12">
                        <label for="rule" class="form-label">Rule</label>
                        <input type="number" class="form-control" value="{{$admin->rule}}" name="rule" placeholder="Salary">
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
