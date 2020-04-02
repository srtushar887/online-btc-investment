@extends('layouts.frontend')
@section('front')


    <!-- breadcrump end -->

    <!-- login-2 begin-->
    <div class="login">
        <div class="container">
            <div class="row">

                <div class="col-xl-6 col-lg-6 text-center" style="margin: 0 auto">
                    <div class="part-form">
                        <h3 class="login-title">Enter Your Code</h3>
                        <form action="{{route('reset.passsend.save')}}" method="post">
                            @csrf
                            <input type="hidden" name="user" value="{{$user->id}}">
                            <input type="password" name="npass" required placeholder="Your New Password">
                            <input type="password" name="cpass" required placeholder="Your Confirm Password">
                            <button type="submit">Save</button>
                        </form>
                    </div>
                </div>


            </div>
        </div>
    </div>
    <!-- login-2 end -->

@endsection
