@extends('layouts.user')
@section('user')
    <div class="row">
        <div class="col-12">
            <div class="page-title-box">
                <h4 class="page-title">My Referral User</h4>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-12">
            <div class="card-box">
                <h4 class="header-title">User List</h4>
                <div class="table-responsive">

                    <table class="table mb-0">
                        <thead>
                        <tr>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Phone</th>
                            <th>Created Date</th>
                        </tr>
                        </thead>
                        <tbody>
                        @if(count($user) > 0)
                        @foreach($user as $plan)
                            <tr>
                                <td>{{$plan->name}}</td>
                                <td>{{$plan->email}}</td>
                                <td>{{$plan->phone}}</td>
                                <td>{{$plan->created_at}}</td>
                            </tr>
                        @endforeach
                            @else
                        <tr>
                            <td colspan="4"><p class="text-center">No User Available</p></td>
                        </tr>
                            @endif
                        </tbody>
                    </table>
                </div>
            </div>

        </div>

    </div>
@endsection
