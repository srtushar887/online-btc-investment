@extends('layouts.admin')
@section('admin')
    <!-- start page title -->
    <div class="row">
        <div class="col-12">
            <div class="page-title-box">
                <div class="page-title-right">

                </div>
                <h4 class="page-title">Dashboard</h4>
            </div>
        </div>
    </div>
    <!-- end page title -->

    <div class="row">
        <div class="col-md-6 col-xl-3">
            <div class="card-box tilebox-one">
                <h5 class="text-muted text-uppercase mb-3 mt-0">Total User</h5>
                <h3 class="mb-3" data-plugin="counterup">{{$user}}</h3>
            </div>
        </div>
        <div class="col-md-6 col-xl-3">
            <div class="card-box tilebox-one">
                <h5 class="text-muted text-uppercase mb-3 mt-0">Total Deposit</h5>
                <h3 class="mb-3" data-plugin="counterup">${{$dep}}</h3>
            </div>
        </div>
        <div class="col-md-6 col-xl-3">
            <div class="card-box tilebox-one">
                <h5 class="text-muted text-uppercase mb-3 mt-0">Total Commission Withdraw</h5>
                <h3 class="mb-3" data-plugin="counterup">${{$comwith}}</h3>
            </div>
        </div>


    </div>
    <div class="row">
        <div class="col-md-6 col-xl-6">
            <div class="card-box tilebox-one">
                <h5 class="text-muted text-uppercase mb-3 mt-0">{{ $chart1->options['chart_title'] }}</h5>
                {!! $chart1->renderHtml() !!}
            </div>
        </div>
        <div class="col-md-6 col-xl-6">
            <div class="card-box tilebox-one">
                <h5 class="text-muted text-uppercase mb-3 mt-0">{{ $chart2->options['chart_title'] }}</h5>
                {!! $chart2->renderHtml() !!}
            </div>
        </div>


    </div>
@endsection
@section('js')
    {!! $chart1->renderChartJsLibrary() !!}

    {!! $chart1->renderJs() !!}
    {!! $chart2->renderJs() !!}
@endsection
