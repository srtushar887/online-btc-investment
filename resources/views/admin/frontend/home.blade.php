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

            <form class="card-box" action="{{route('admin.home.save')}}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="row">
                    <div class="form-group col-md-6">
                        <label>Titel</label>
                        <input type="text" class="form-control" name="home_title" value="{{$home->home_title}}">
                    </div>
                    <div class="form-group col-md-6">
                        <label>Sub-Titel</label>
                        <input type="text" class="form-control" name="home_sub_title" value="{{$home->home_sub_title}}">
                    </div>
                    <div class="form-group col-md-6">
                        <label>Background Image</label>
                        <br>
                        <img src="{{asset('assets/frontend/')}}/img/banner.jpg" style="height: 100px;width: 100px;">
                        <input type="file" class="form-control" name="home_backgorund_image" >
                    </div>

                    <div class="form-group col-md-12">
                        <button class="btn btn-success">Save</button>
                    </div>
                </div>

            </form>

        </div>
    </div>
@endsection
