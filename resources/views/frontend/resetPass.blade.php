@extends('layouts.frontend')
@section('front')


    <!-- breadcrump end -->

    <!-- login-2 begin-->
    <div class="login">
        <div class="container">
            <div class="row">

                <div class="col-xl-6 col-lg-6 text-center" style="margin: 0 auto">
                    <div class="part-form">
                        <h3 class="login-title">Enter Your Email</h3>
                        <form action="{{route('reset.passsend.email')}}" method="post">
                            @csrf
                            <input type="text" name="email" required placeholder="Your Email">
                            <button type="submit">Send</button>
                        </form>
                    </div>
                </div>


            </div>
        </div>
    </div>
    <!-- login-2 end -->

@endsection
