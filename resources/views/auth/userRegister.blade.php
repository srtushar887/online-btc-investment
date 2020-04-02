@extends('layouts.frontend')
@section('front')


    <!-- breadcrump end -->

    <!-- login-2 begin-->
    <div class="login">
        <div class="container">
            <div class="row">

                <div class="col-xl-5 col-lg-5">
                    <div class="part-form">
                        <h3 class="login-title">Login with username</h3>
                        <form action="{{route('register')}}" method="post">
                            @csrf
                            <input type="text" name="have_ref" placeholder="Ref ID">
                            <input type="text" name="name" placeholder="Your Full Name">
                            <input type="text" name="email" placeholder="Your Email">
                            <input type="text" name="phone" placeholder="Your Phone">
                            <input type="password" name="password" placeholder="Password">
                            <input type="password" name="password_confirmation" placeholder="Confirm Password">
                            <button type="submit">Login Now</button>
                        </form>
                        <span class="forget-password">Forgot Your Password?<a href="{{route('reset.pass')}}">Reset Now</a></span>
                    </div>
                </div>

                <div class="col-xl-2 col-lg-2">
                    <div class="line">
                        <div class="or">Or</div>
                    </div>
                </div>
                <div class="col-xl-5 col-lg-5">
                    <div class="login-with-social">
                        <h3 class="login-title">Login with social media</h3>
                        <a class="facebook social-link" href="{{ url('/auth/redirect/facebook') }}">Login With Facebook</a>
                        <a class="google social-link" href="{{ url('/auth/redirect/google') }}">Login With google+</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- login-2 end -->

@endsection
