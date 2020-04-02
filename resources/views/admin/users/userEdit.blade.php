@extends('layouts.admin')
@section('admin')
    <!-- start page title -->
    <div class="row">
        <div class="col-12">
            <div class="page-title-box">
                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                    </ol>
                </div>
                <h4 class="page-title">Users Details</h4>
            </div>
        </div>
    </div>
    <!-- end page title -->

    <div class="row">
        <div class="col-md-12">

            <form class="card-box" action="{{route('admin.user.save')}}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="row">
                    <div class="form-group col-md-6">
                        <label>User Name</label>
                        <input type="hidden" name="user_id" value="{{$user->id}}">
                        <input type="text" class="form-control" name="name" value="{{$user->name}}">
                    </div>
                    <div class="form-group col-md-6">
                        <label>User Email</label>
                        <input type="text" class="form-control" name="email" value="{{$user->email}}">
                    </div>
                    <div class="form-group col-md-6">
                        <label>User Phone</label>
                        <input type="text" class="form-control" name="phone" value="{{$user->phone}}">
                    </div>
                    <div class="form-group col-md-6">
                        <label>User Withdraw Address</label>
                        <input type="text" class="form-control" name="with_wallet" value="{{$user->with_wallet}}">
                    </div>
                    <div class="form-group col-md-6">
                        <label>User Balance</label>
                        <input type="text" class="form-control" name="balance" value="{{$user->balance}}">
                    </div>
                    <div class="form-group col-md-6">
                        <label>Password</label>
                        <input type="text" class="form-control" name="password">
                    </div>


                    <div class="form-group col-md-12">
                        <button class="btn btn-success">Save</button>
                    </div>
                </div>

            </form>

        </div>
    </div>
@endsection
