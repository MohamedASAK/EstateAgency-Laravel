@extends('layouts.app')

@section('MainTitle')
Create Message
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
                <form action="{{route('message.store')}}" method="POST" enctype="multipart/form-data" class="row g-3">
                    @csrf
                    <div class="col-12">
                        <label for="message" class="form-label">Message</label>
                        <input type="text" class="form-control" name="message" placeholder="Message">
                    </div>
                    <div class="col-12">
                        <label for="userId" class="form-label">User ID</label>
                        <input type="text" class="form-control" name="userId" placeholder="User ID">
                    </div>
                    <div class="col-12">
                        <label for="answer" class="form-label">Answer</label>
                        <input type="text" class="form-control" name="answer" placeholder="Answer">
                    </div>                    </div>
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
