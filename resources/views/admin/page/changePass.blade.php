@extends('layouts.admin')
@section('admin')
    <div class="row">
        <div class="col-12">
            <div class="page-title-box">
                <h4 class="page-title">Change Password</h4>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12">

            <form class="card-box" action="{{route('admin.pass.save')}}" method="post" enctype="multipart/form-data">
                @csrf

                <div class="row">
                    <div class="col-md-6">
                        <label>New Password</label>
                        <input type="text" name="n_pass"  id="autocomplete-ajax" class="form-control" autocomplete="off">
                    </div>
                    <div class="col-md-6">
                        <label>Confirm Password</label>
                        <input type="text" name="c_pass"  id="autocomplete-ajax" class="form-control" autocomplete="off">
                    </div>
                </div>
                <br>
                <button class="btn btn-success">Save</button>
            </form>

        </div>

    </div>
@endsection
