@extends('layouts.user')
@section('user')
    <div class="row">
        <div class="col-12">
            <div class="page-title-box">
                <h4 class="page-title">My Plan</h4>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-12">
            <div class="card-box">
                <h4 class="header-title">Plan List</h4>
                <div class="table-responsive">

                    <table class="table mb-0">
                        <thead>
                        <tr>
                            <th>Plan Name</th>
                            <th>Plan Amount</th>
                            <th>Plan Commission</th>
                            <th>Created Date</th>
                            <th>Status</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($plans as $plan)
                        <tr>
                            <td>{{$plan->plan->plan_name}}</td>
                            <td>{{$plan->amount}}</td>
                            <td>{{$plan->plan->rep_per}} %</td>
                            <td>{{$plan->created_at}}</td>
                            <td>
                                @if($plan->status == 0)
                                    <button class="btn btn-primary btn-sm">Running</button>
                                    @else
                                    <button class="btn btn-success btn-sm">Complete</button>
                                    @endif
                            </td>
                        </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>

        </div>

    </div>
@endsection
