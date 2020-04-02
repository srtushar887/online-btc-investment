@extends('layouts.admin')
@section('admin')
    <div class="row">
        <div class="col-12">
            <div class="page-title-box">
                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <button class="btn btn-success btn-sm pull-left" data-toggle="modal" data-target="#exampleModalCenter">Create New</button>
                    </ol>
                </div>
                <h4 class="page-title">Plan</h4>
            </div>
        </div>
    </div>

    <div class="row">
        @foreach($plans as $plan)
        <div class="col-md-4">
            <div class="card">
                <h5 class="card-header">{{$plan->plan_name}}</h5>
                <div class="card-body">
                    <div style="font-size: 18px;padding: 18px;" class="panel-body text-center">
                        <p><strong>{{$plan->min_am}} BDT - {{$plan->max_am}} BDT</strong></p>
                    </div>
                    <ul style="font-size: 15px;" class="list-group text-center bold">
                        <li class="list-group-item"><i class="fa fa-check"></i> Commission - {{$plan->rep_per}} <i class="fa fa-percent"></i> </li>
                        <li class="list-group-item"><i class="fa fa-check"></i> Repeat - {{$plan->rep_time}} times </li>
                        <li class="list-group-item"><i class="fa fa-check"></i> Compound - <span class="aaaa">{{$plan->rep_com}}</span></li>
                        <li class="list-group-item"><span class="aaaa">
                                @if($plan->status == 1)
                                    Active
                                    @else
                                In-Active
                                    @endif
                            </span></li>
                    </ul>
                    <br>
                    <button class="btn btn-primary" data-toggle="modal" data-target="#editplan{{$plan->id}}">Edit</button>
                    <button class="btn btn-primary" data-toggle="modal" data-target="#deleteplan{{$plan->id}}">Delete</button>
                </div>
            </div>
        </div>

            <div class="modal fade" id="editplan{{$plan->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLongTitle">Modal title</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <form action="{{route('plan.update')}}" method="post">
                            @csrf
                            <div class="modal-body">
                                <div class="form-group">
                                    <label>PLAN NAME :</label>
                                    <input type="text" name="plan_name" value="{{$plan->plan_name}}" class="form-control">
                                    <input type="hidden" name="plan_id" value="{{$plan->id}}" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label>MINIMUM AMOUNT :</label>
                                    <input type="text" name="min_am" value="{{$plan->min_am}}" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label>MAXIMUM AMOUNT :</label>
                                    <input type="text" name="max_am" value="{{$plan->max_am}}" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label>COMMISSION :</label>
                                    <input type="text" name="rep_per" value="{{$plan->rep_per}}" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label>Status :</label>
                                    <select class="form-control" name="status">
                                        <option value="0" {{$plan->status == 0 ? 'selected' : ''}}>select any</option>
                                        <option value="1" {{$plan->status == 1 ? 'selected' : ''}}>Active</option>
                                        <option value="2" {{$plan->status == 2 ? 'selected' : ''}}>In-Active</option>
                                    </select>
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
            <div class="modal fade" id="deleteplan{{$plan->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLongTitle">Modal title</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <form action="{{route('plan.delete')}}" method="post">
                            @csrf
                            <div class="modal-body">
                                <div class="form-group">
                                    are you sure to delete this plan ?
                                    <input type="hidden" name="plan_delete_id" value="{{$plan->id}}" class="form-control">
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



    </div>
    <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">Modal title</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="{{route('plan.save')}}" method="post">
                    @csrf
                <div class="modal-body">
                    <div class="form-group">
                        <label>PLAN NAME :</label>
                        <input type="text" name="plan_name" class="form-control">
                    </div>
                    <div class="form-group">
                        <label>MINIMUM AMOUNT :</label>
                        <input type="text" name="min_am" class="form-control">
                    </div>
                    <div class="form-group">
                        <label>MAXIMUM AMOUNT :</label>
                        <input type="text" name="max_am" class="form-control">
                    </div>
                    <div class="form-group">
                        <label>COMMISSION :</label>
                        <input type="text" name="rep_per" class="form-control">
                    </div>
                    <div class="form-group">
                        <label>Status :</label>
                        <select class="form-control" name="status">
                            <option value="0">select any</option>
                            <option value="1">Active</option>
                            <option value="2">In-Active</option>
                        </select>
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
