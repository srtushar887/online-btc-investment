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
                <h4 class="page-title">About us Page</h4>
            </div>
        </div>
    </div>
    <!-- end page title -->

    <div class="row">
        <div class="col-md-12">

            <form class="card-box" action="{{route('admin.aboutuspage.save')}}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="row">
                    <div class="form-group col-md-12">
                        <label>Titel</label>
                        <input type="text" class="form-control" name="about_us_page_title" value="{{$aboutpage->about_us_page_title}}">
                    </div>
                    <div class="form-group col-md-12">
                        <label>Sub-Titel</label>
                        <textarea type="text" cols="6" rows="6" class="form-control" name="about_us_page_des" >{!! $aboutpage->about_us_page_des !!}</textarea>
                    </div>
                    <div class="form-group col-md-12">
                        <button class="btn btn-success">Save</button>
                    </div>
                </div>

            </form>

        </div>
    </div>
@endsection
