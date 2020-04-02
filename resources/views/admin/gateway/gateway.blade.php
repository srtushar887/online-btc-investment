@extends('layouts.admin')
@section('admin')
    <!-- start page title -->
    <div class="row">
        <div class="col-12">
            <div class="page-title-box">
                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="javascript: void(0);">Abstack</a></li>
                        <li class="breadcrumb-item active">Dashboard</li>
                    </ol>
                </div>
                <h4 class="page-title">Dashboard</h4>
            </div>
        </div>
    </div>
    <!-- end page title -->

    <div class="row">
        <div class="col-md-12">

            <form class="card-box" action="{{route('admin.gateway.save')}}" method="post">
                @csrf
                <div class="row">
                    <div class="form-group col-md-6">
                        <label>Main Name</label>
                        <input type="hidden" name="edit_id" value="{{$gatewway->id}}">
                        <input type="text" class="form-control" name="main_name" value="{{$gatewway->main_name}}">
                    </div>
                    <div class="form-group col-md-6">
                        <label>Name</label>
                        <input type="text" class="form-control" name="name" value="{{$gatewway->name}}">
                    </div>
                    <div class="form-group col-md-6">
                        <label>Rate</label>
                        <input type="text" class="form-control" name="rate" value="{{$gatewway->rate}}">
                    </div>
                    <div class="form-group col-md-6">
                        <label>Fixed Charge for Transaction</label>
                        <input type="text" class="form-control" name="fixed_charge" value="{{$gatewway->fixed_charge}}">
                    </div>
                    <div class="form-group col-md-6">
                        <label>Percentage Charge of Transaction</label>
                        <input type="text" class="form-control" name="percent_charge" value="{{$gatewway->percent_charge}}">
                    </div>
                    <div class="form-group col-md-6">
                        <label>Minimum Ammount</label>
                        <input type="text" class="form-control" name="minamo" value="{{$gatewway->minamo}}">
                    </div>
                    <div class="form-group col-md-6">
                        <label>Maximun Ammount</label>
                        <input type="text" class="form-control" name="maxamo" value="{{$gatewway->maxamo}}">
                    </div>
                    <div class="form-group col-md-6">
                        <label>Public Key</label>
                        <input type="text" class="form-control" name="val1" value="{{$gatewway->val1}}">
                    </div>
                    <div class="form-group col-md-6">
                        <label>Private Key</label>
                        <input type="text" class="form-control" name="val2" value="{{$gatewway->val2}}">
                    </div>
                    <div class="form-group col-md-12">
                        <button class="btn btn-success">Save</button>
                    </div>
                </div>

            </form>

        </div>
    </div>
@endsection
