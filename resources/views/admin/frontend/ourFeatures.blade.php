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

            <form class="card-box" action="{{route('admin.ourfeature.header.save')}}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="row">
                    <div class="form-group col-md-6">
                        <label>Titel</label>
                        <input type="text" class="form-control" name="home_our_feature_title" value="{{$home->home_our_feature_title}}">
                    </div>
                    <div class="form-group col-md-6">
                        <label>Sub-Titel</label>
                        <input type="text" class="form-control" name="home_our_feature_subtitle" value="{{$home->home_our_feature_subtitle}}">
                    </div>

                    <div class="form-group col-md-12">
                        <button class="btn btn-success">Save</button>
                    </div>
                </div>

            </form>

        </div>
    </div>


    <div class="row">
        <div class="col-lg-12">
            <div class="card-box">
                <h4 class="header-title">How It Data</h4>
                <div class="table-responsive">

                    <table class="table mb-0">
                        <thead>
                        <tr>
                            <th>Icon</th>
                            <th>Title</th>
                            <th>Sub-Title</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($data as $dt)
                            <tr>
                                <td>{{$dt->icon}}</td>
                                <td>{{$dt->title}}</td>
                                <td>{{$dt->sub_title}}</td>
                                <td>
                                    <button class="btn btn-success btn-sm" data-toggle="modal" data-target="#ourfetdata{{$dt->id}}"><i class="fas fa-eye"></i> </button>
                                </td>
                            </tr>

                            <div class="modal fade" id="ourfetdata{{$dt->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLongTitle">Edit</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <form action="{{route('admin.ourfeature.data.save')}}" method="post">
                                            @csrf
                                            <div class="modal-body">
                                                <div class="form-group">
                                                    <label>Iocn</label>
                                                    <input type="hidden" class="form-control" name="edit_o_f_data" value="{{$dt->id}}">
                                                    <input type="text" class="form-control" name="icon" value="{{$dt->icon}}">
                                                </div>
                                                <div class="form-group">
                                                    <label>Title</label>
                                                    <input type="text" class="form-control" name="title" value="{{$dt->title}}">
                                                </div>
                                                <div class="form-group">
                                                    <label>Sub-Title</label>
                                                    <input type="text" class="form-control" name="sub_title" value="{{$dt->sub_title}}">
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                <button type="submit" class="btn btn-primary">Choose</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        @endforeach

                        </tbody>
                    </table>
                </div>
            </div>

        </div>


    </div>
@endsection
