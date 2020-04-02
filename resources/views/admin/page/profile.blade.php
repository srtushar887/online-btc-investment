@extends('layouts.admin')
@section('admin')
    <div class="row">
        <div class="col-12">
            <div class="page-title-box">
                <h4 class="page-title">Profile</h4>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12">

            <form class="card-box" action="{{route('admin.profile.save')}}" method="post" enctype="multipart/form-data">
                @csrf

                <div class="row">
                    <div class="col-md-6">
                        <label>Name</label>
                        <input type="text" name="name" value="{{$user->name}}" id="autocomplete-ajax" class="form-control" autocomplete="off">
                    </div>
                    <div class="col-md-6">
                        <label>Email</label>
                        <input type="text" name="email" value="{{$user->email}}" id="autocomplete-ajax" class="form-control" autocomplete="off">
                    </div>
                    <div class="col-md-6">
                        <label>Phone</label>
                        <input type="text" name="phone" value="{{$user->phone}}" id="autocomplete-ajax" class="form-control" autocomplete="off">
                    </div>
                    <br>
                    <br>
                    <div class="col-md-6">
                        <label>profile Image</label>
                        <br>
                        <img src="{{asset($user->image)}}" style="height: 100px;width: 100px;">
                        <input type="file" name="image" id="autocomplete-ajax" class="form-control" autocomplete="off">
                    </div>
                </div>
                <br>
                <button class="btn btn-success">Save</button>
            </form>

        </div>

    </div>
@endsection
