@extends('layouts.user')
@section('user')
    <div class="row">
        <div class="col-12">
            <div class="page-title-box">
                <h4 class="page-title">Plan</h4>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12">

            <form class="card-box" action="{{route('user.deposit.save')}}" method="post">
                @csrf
                <h4 class="header-title">Enter Amount</h4>

                <div class="">
                    <input type="number" name="amount" id="autocomplete-ajax" class="form-control" autocomplete="off">
                </div>
                <br>
                <button class="btn btn-success">Save</button>
            </form>

        </div>

    </div>
@endsection
