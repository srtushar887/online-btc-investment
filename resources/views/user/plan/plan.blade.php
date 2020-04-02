@extends('layouts.user')
@section('user')
    <div class="row">
        <div class="col-12">
            <div class="page-title-box">
                <h4 class="page-title">Plan</h4>
            </div>
        </div>
    </div>

    <div class="row">
        @foreach($plans as $plan)
            <div class="col-md-4">
                <div class="card">
                    <h5 class="card-header">Plan</h5>
                    <div class="card-body">
                        <div style="font-size: 18px;padding: 18px;" class="panel-body text-center">
                            <p><strong>{{$plan->plan_name}}</strong></p>
                        </div>
                        <ul style="font-size: 15px;" class="list-group text-center bold">
                            <li class="list-group-item"><i class="fa fa-check"></i> Commission - {{$plan->rep_per}} <i class="fa fa-percent"></i> </li>
                            <li class="list-group-item"><i class="fa fa-check"></i> MIN - ${{$plan->min_am}} </li>
                            <li class="list-group-item"><i class="fa fa-check"></i> Max - <span class="aaaa">${{$plan->max_am}}</span></li>
                        </ul>
                        <br>
                        <button class="btn btn-primary" data-toggle="modal" data-target="#choseplan{{$plan->id}}">Choose Plan</button>
                    </div>
                </div>
            </div>
            <div class="modal fade" id="choseplan{{$plan->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLongTitle">{{$plan->plan_name}}</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <form action="{{route('user.choose.plan.save')}}" method="post">
                            @csrf
                            <div class="modal-body">
                                <div class="form-group">
                                    <label>Amount</label>
                                    <input type="number" class="form-control" name="am">
                                    <input type="hidden" name="planid" value="{{$plan->id}}" class="form-control">
                                    <input type="hidden" name="plan_minam" value="{{$plan->min_am}}" class="form-control">
                                    <input type="hidden" name="plan_manam" value="{{$plan->max_am}}" class="form-control">
                                    <input type="hidden" name="plan_delete_id" value="{{$plan->id}}" class="form-control">
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



    </div>
@endsection
