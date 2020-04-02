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
                <h4 class="page-title">General Settings</h4>
            </div>
        </div>
    </div>
    <!-- end page title -->

    <div class="row">
        <div class="col-md-12">

            <form class="card-box" action="{{route('admin.general.save')}}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="row">
                    <div class="form-group col-md-6">
                        <label>Site Name</label>
                        <input type="text" class="form-control" name="site_name" value="{{$gen_data->site_name}}">
                    </div>
                    <div class="form-group col-md-6">
                        <label>Site Email</label>
                        <input type="text" class="form-control" name="site_email" value="{{$gen_data->site_email}}">
                    </div>
                    <div class="form-group col-md-6">
                        <label>Site Address</label>
                        <input type="text" class="form-control" name="site_address" value="{{$gen_data->site_address}}">
                    </div>
                    <div class="form-group col-md-6">
                        <label>Site Phone</label>
                        <input type="text" class="form-control" name="site_phone" value="{{$gen_data->site_phone}}">
                    </div>
                    <div class="form-group col-md-6">
                        <label>Site Logo</label>
                        <br>
                        <img src="{{asset($gen_data->site_logo)}}" style="height: 100px;width: 100px;">
                        <input type="file" class="form-control" name="site_logo">
                    </div>
                    <div class="form-group col-md-6">
                        <label>Site Icon</label>
                        <br>
                        <img src="{{asset($gen_data->site_icon)}}" style="height: 100px;width: 100px;">
                        <input type="file" class="form-control" name="site_icon" >
                    </div>

                    <div class="form-group col-md-12">
                        <button class="btn btn-success">Save</button>
                    </div>
                </div>

            </form>

        </div>
    </div>
@endsection
