@extends('layouts.user')
@section('user')
    <div class="row">
        <div class="col-12">
            <div class="page-title-box">
                <h4 class="page-title">Withdraw Percentage</h4>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-12">
            <div class="card-box">
                <h4 class="header-title">Withdraw List</h4>
                <div class="table-responsive">

                    <table class="table mb-0">
                        <thead>
                        <tr>

                            <th>Plan Amount</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($with as $plan)
                            <tr>
                                <td>${{$plan->amount}}</td>
                                <td>
                                    @if($plan->status == 0)
                                    <button class="btn btn-danger btn-sm" >Running</button>
                                    @elseif($plan->status == 1)
                                        <button class="btn btn-success btn-sm" data-toggle="modal" data-target="#with{{$plan->id}}">Withdraw</button>
                                    @elseif($plan->status == 3)
                                        <button class="btn btn-success btn-sm" >Pending</button>
                                    @else
                                        <button class="btn btn-success btn-sm" >Complete</button>
                                        @endif
                                </td>
                            </tr>


                            <div class="modal fade" id="with{{$plan->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLongTitle">Withdraw</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <form action="{{route('percentage.with.save')}}" method="post">
                                            @csrf
                                            <div class="modal-body">
                                                <div class="form-group">
                                                    are you sure to withdraw ?
                                                    <input type="hidden" name="wid" value="{{$plan->id}}" class="form-control">
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                <button type="submit" class="btn btn-primary">Withdraw</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                        </tbody>

                    </table>
                    {{$with->links()}}
                </div>
            </div>

        </div>

    </div>
@endsection
