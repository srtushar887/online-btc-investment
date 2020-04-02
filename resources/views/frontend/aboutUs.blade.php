@extends('layouts.frontend')
@section('front')
    <div class="hyip-breadcrump">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-xl-6 col-lg-6">
                    <div class="breadcrump-title text-center">
                        <h2>About Us</h2>
                        <span>Home <i class="fas fa-chevron-right"></i> About</span>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="about-page">
        <div class="container">
            <div class="row">

                <div class="col-xl-12 col-lg-12 d-xl-flex d-lg-flex align-items-center">
                    <div class="part-text">
                        <h3>{{$about->about_us_page_title}}</h3>
                        <p>{!! $about->about_us_page_des !!}</p>

                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- about area end -->

    @endsection
