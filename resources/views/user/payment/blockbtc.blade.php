@extends('layouts.user')
@section('css')
    <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

@endsection
@section('user')
    <div class="row">
        <div class="col-md-12">
                <h6 class="text-center"> PLEASE SEND EXACTLY <span style="color: green"> {{ $bcoin }}</span> BTC</h6>
                <h5 class="text-center">TO <span style="color: green"> {{ $wallet}}</span></h5>
                <div class="card-body text-center" style="margin: 0 auto;">
                    {!! $qrurl !!}
                    <h4 class="card-title font-16 mt-0 text-center">SCAN TO SEND</h4>


                        <form action="" method="post">
                            @csrf
                            <input type="hidden" name="Track" value="{{$track}}">
                            <input type="hidden" class="time" name="time" value="{{$data->vsent}}">
                            <p style="margin: 0 auto;" class="text-center">AFTER PAID PLEASE WAIT 5-10 SEC AND  CLICK THE BELLOW BUTTON</p>
                            <button class="btn btn-success btn-block" style="margin: 0 auto" >Confirm Now</button>
                        </form>




                </div>

            </div>


    </div>
@endsection
@section('js')

    @endsection
