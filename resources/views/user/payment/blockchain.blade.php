@extends('layouts.user')
@section('css')
    <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

@endsection
@section('user')
    <section class="become-investor">
        <div class="thm-container">
            <div class="sec-title text-center">
                <h2>{{$pt}}</h2>
                <div class="col-md-4 col-md-offset-8">
                </div>
            </div>
            <div class="row">
                <div class="col-md-8 col-md-offset-2">

                    <div class="panel panel-primary">
                        <div class="panel-body text-center">
                            <h6> PLEASE SEND EXACTLY <span style="color: green"> {{ $bitcoin->amount }}</span> BTC</h6>
                            <h5>TO <span style="color: green"> {{ $bitcoin->sendto }}</span></h5>
                            {!! $bitcoin->code !!}
                            <h4 style="font-weight:bold;">SCAN TO SEND</h4>
                        </div>
                    </div>


                </div>
            </div>
        </div>
    </section>

@endsection
