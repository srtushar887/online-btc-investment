@extends('layouts.frontend')
@section('front')
    <div class="hyip-breadcrump extra_padding">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-xl-8 col-lg-8">
                    <div class="breadcrump-title text-center">
                        <h2 class="add-space">Investment Packages</h2>
                        <span>Home <i class="fas fa-chevron-right"></i> Investment Packages</span>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="price">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-xl-8 col-lg-8">
                    <div class="section-title">
                        <h2>Investment Plans</h2>

                    </div>
                </div>
            </div>

            <div class="row">

                <div class="col-xl-12 col-lg-12">

                    <div class="tab-content" id="myTabContent2">
                        <div class="tab-pane fade show active" id="monthly" role="tabpanel" aria-labelledby="monthly-tab">
                            <div class="row">
                                @foreach($plans as $plan)
                                <div class="col-xl-4 col-lg-4 col-md-6">
                                    <div class="single-price">
                                        <div class="part-top">
                                            <h3>{{$plan->plan_name}}</h3>
                                            <h4>{{$plan->rep_per}}%<br /><span>Every Weak</span></h4>
                                        </div>
                                        <div class="part-bottom">
                                            <ul>
                                                <li>Features</li>
                                                <li>Minimum Deposit ${{$plan->min_am}}</li>
                                                <li>Miximum Deposit ${{$plan->max_am}}</li>
                                                <li>Enhanced security</li>
                                                <li>Access to all features</li>
                                                <li>24/7Support</li>
                                            </ul>
                                            <a href="{{route('all.plan')}}">Buy Now</a>
                                        </div>
                                    </div>
                                </div>
                                @endforeach




                            </div>
                        </div>
                        <div class="tab-pane fade" id="yearly" role="tabpanel" aria-labelledby="yearly-tab">
                            <div class="row">

                                <div class="col-xl-4 col-lg-4 col-md-6">
                                    <div class="single-price">
                                        <div class="part-top">
                                            <h3>Classic</h3>
                                            <h4>2%<br /><span>Daily for 75 Days</span></h4>
                                        </div>
                                        <div class="part-bottom">
                                            <ul>
                                                <li>Features</li>
                                                <li>Minimum Deposit $10</li>
                                                <li>Miximum Deposit $10,000</li>
                                                <li>Enhanced security</li>
                                                <li>Access to all features</li>
                                                <li>24/7Support</li>
                                            </ul>
                                            <a href="#">Buy Now</a>
                                        </div>
                                    </div>
                                </div>


                                <div class="col-xl-4 col-lg-4 col-md-6">
                                    <div class="single-price special">
                                        <div class="part-top">
                                            <h3>Premium</h3>
                                            <h4>5%<br /><span>Daily for 75 Days</span></h4>
                                        </div>
                                        <div class="part-bottom">
                                            <ul>
                                                <li>Features</li>
                                                <li>Minimum Deposit $10</li>
                                                <li>Miximum Deposit $10,000</li>
                                                <li>Enhanced security</li>
                                                <li>Access to all features</li>
                                                <li>24/7Support</li>
                                            </ul>
                                            <a href="#">Buy Now</a>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-xl-4 col-lg-4 col-md-6">
                                    <div class="single-price">
                                        <div class="part-top">
                                            <h3>Professional</h3>
                                            <h4>7%<br /><span>Daily for 75 Days</span></h4>
                                        </div>
                                        <div class="part-bottom">
                                            <ul>
                                                <li>Features</li>
                                                <li>Minimum Deposit $10</li>
                                                <li>Miximum Deposit $10,000</li>
                                                <li>Enhanced security</li>
                                                <li>Access to all features</li>
                                                <li>24/7Support</li>
                                            </ul>
                                            <a href="#">Buy Now</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
    @endsection
