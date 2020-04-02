@extends('layouts.user')
@section('user')
    <!-- start page title -->
    <div class="row">
        <div class="col-12">
            <div class="page-title-box">

                <h4 class="page-title">Dashboard</h4>
            </div>
        </div>
    </div>
    <!-- end page title -->

    <div class="row">
        <div class="col-md-6 col-xl-3">
            <div class="card-box tilebox-one">
                <h5 class="text-muted text-uppercase mb-3 mt-0">My Balance</h5>
                <h3 class="mb-3">$<span data-plugin="counterup">{{number_format(Auth::user()->balance)}}</span></h3>

            </div>
        </div>

        <div class="col-md-6 col-xl-3">
            <div class="card-box tilebox-one">
                <h5 class="text-muted text-uppercase mb-3 mt-0">My Plan</h5>
                <h3 class="mb-3"><span data-plugin="counterup">{{$plan}}</span></h3>
            </div>
        </div>

        <div class="col-md-6 col-xl-3">
            <div class="card-box tilebox-one">
                <h5 class="text-muted text-uppercase mb-3 mt-0">Referall User</h5>
                <h3 class="mb-3"><span data-plugin="counterup">{{$ref_user}}</span></h3>
            </div>
        </div>

    </div>
@endsection
