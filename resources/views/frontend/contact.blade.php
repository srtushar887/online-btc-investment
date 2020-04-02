@extends('layouts.frontend')
@section('front')
    <div class="hyip-breadcrump">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-xl-8 col-lg-8">
                    <div class="breadcrump-title text-center">
                        <h2>Contact</h2>
                        <span>Home <i class="fas fa-chevron-right"></i> Contact</span>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="contact">
        <div class="part-address">
            <div class="container">
                <div class="row">
                    <div class="col-xl-4 col-lg-4 col-md-6">
                        <div class="single-adress">
                            <div class="part-icon">
                                <i class="fas fa-envelope"></i>
                            </div>
                            <div class="part-text">
                                <h3>Email Address</h3>
                                <ul>
                                    <li>{{$gn->site_email}}</li>
                                </ul>
                            </div>
                        </div>
                    </div>

                    <div class="col-xl-4 col-lg-4 col-md-6">
                        <div class="single-adress">
                            <div class="part-icon">
                                <i class="fas fa-phone"></i>
                            </div>
                            <div class="part-text">
                                <h3>Phone Number</h3>
                                <ul>
                                    <li>+{{$gn->site_phone}}</li>
                                </ul>
                            </div>
                        </div>
                    </div>

                    <div class="col-xl-4 col-lg-4 col-md-6">
                        <div class="single-adress">
                            <div class="part-icon">
                                <i class="fas fa-map"></i>
                            </div>
                            <div class="part-text">
                                <h3>Office Address</h3>
                                <ul>
                                    <li>{!! $gn->site_address !!}</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="get-in-touch">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-xl-8 col-lg-8">
                        <div class="section-title">
                            <h2>Get In Touch</h2>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-xl-12 col-lg-12">
                        <div class="part-form">
                            <form action="{{route('user.send.contact')}}" method="post">
                                @csrf
                                <div class="row">
                                    <div class="col-xl-6 col-lg-6">
                                        <input type="text" name="name" placeholder="Name" required>
                                    </div>
                                    <div class="col-xl-6 col-lg-6">
                                        <input type="email" name="email" placeholder="Email Address" required>
                                    </div>
                                    <div class="col-xl-12 col-lg-12">
                                        <input type="text" name="subject" placeholder="Your Subject" required>
                                    </div>
                                    <div class="col-xl-12 col-lg-12">
                                        <textarea placeholder="Your Message" name="message" required></textarea>
                                    </div>
                                    <div class="col-xl-12 col-lg-12">
                                        <button type="submit">Send Message Now</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
