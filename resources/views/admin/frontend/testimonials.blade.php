@extends('layouts.admin')
@section('admin')
    <!-- start page title -->
    <div class="row">
        <div class="col-12">
            <div class="page-title-box">
                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <button class="btn btn-success btn-sm pull-left" data-toggle="modal" data-target="#createtest">Create New</button>
                    </ol>
                </div>
                <h4 class="page-title">Testimonials</h4>
            </div>
        </div>
    </div>
    <!-- end page title -->

    <div class="row">
        <div class="col-lg-12">
            <div class="card-box">
                <div class="table-responsive">

                    <table class="table mb-0">
                        <thead>
                        <tr>
                            <th>Name</th>
                            <th>Designation</th>
                            <th>Image</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($tests as $dt)
                            <tr>
                                <td>{{$dt->name}}</td>
                                <td>{{$dt->desg}}</td>
                                <td><img src="{{asset($dt->image)}}" style="height: 50px;width: 50px"></td>
                                <td>
                                    <button class="btn btn-success btn-sm" data-toggle="modal" data-target="#edittst{{$dt->id}}"><i class="fas fa-eye"></i> </button>
                                    <button class="btn btn-danger btn-sm" data-toggle="modal" data-target="#deltest{{$dt->id}}"><i class="fas fa-trash"></i> </button>
                                </td>
                            </tr>

                            <div class="modal fade" id="edittst{{$dt->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLongTitle">Edit</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <form action="{{route('test.update')}}" method="post" enctype="multipart/form-data">
                                            @csrf
                                            <div class="modal-body">
                                                <div class="form-group">
                                                    <label> NAME :</label>
                                                    <input type="text" name="name"  value="{{$dt->name}}" class="form-control">
                                                    <input type="hidden" name="testeditid"  value="{{$dt->id}}" class="form-control">
                                                </div>
                                                <div class="form-group">
                                                    <label>DESIGNATION :</label>
                                                    <input type="text" name="desg" value="{{$dt->desg}}" class="form-control">
                                                </div>
                                                <div class="form-group">
                                                    <label>COMMENT :</label>
                                                    <textarea type="text" name="comment" class="form-control">{!! $dt->comment !!}</textarea>
                                                </div>
                                                <div class="form-group">
                                                    <label>IMAGE :</label>
                                                    <br>
                                                    <img src="{{asset($dt->image)}}" style="height: 100px;width: 100px">
                                                    <input type="file" name="image" class="form-control">
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                <button type="submit" class="btn btn-primary">Update</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>


                            <div class="modal fade" id="deltest{{$dt->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLongTitle">Delete</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <form action="{{route('test.delete')}}" method="post" enctype="multipart/form-data">
                                            @csrf
                                            <div class="modal-body">
                                                <div class="form-group">
                                                   are you sure to delete this testimonial ?
                                                    <input type="hidden" name="testdeleteid"  value="{{$dt->id}}" class="form-control">
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                <button type="submit" class="btn btn-primary">Delete</button>
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


    <div class="modal fade" id="createtest" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">Create Testimonials</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="{{route('test.save')}}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="modal-body">
                        <div class="form-group">
                            <label> NAME :</label>
                            <input type="text" name="name" class="form-control">
                        </div>
                        <div class="form-group">
                            <label>DESIGNATION :</label>
                            <input type="text" name="desg" class="form-control">
                        </div>
                        <div class="form-group">
                            <label>COMMENT :</label>
                            <textarea type="text" name="comment" class="form-control"></textarea>
                        </div>
                        <div class="form-group">
                            <label>IMAGE :</label>
                            <input type="file" name="image" class="form-control">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Save</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
