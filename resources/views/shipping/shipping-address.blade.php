@extends('layouts.master')
@section('content')
    <!--content-->
    <div class="content">
        <!--content-->
        <div class="content">
            <div class="well">
                <h2 class="text-success text-center">Shipping Details</h2>
                <br>
                <p class="margin-bottom text-center">Dear,<b> Mr. {{ Session::get('Username') }}</b>, Your shipping is going to bellow this address, if you want to gift your special person you can change the shipping address.</p>
            </div>
            <div class="row">
                <div class="col-md-6 col-md-offset-3">
                    <form action="{{route('new-shipping')}}" method="post">
                        @csrf
                        <div class="form-group">
                            <input type="text" class="form-control" name="username" value="{{ $customer->username }}">
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-control" name="email" value="{{ $customer->email }}">
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-control" name="phone" value="{{ $customer->phone }}">
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-control" name="address" value="{{ $customer->address }}">
                        </div>
                        <div class="form-group">
                            <input type="submit" class="btn btn-success" name="btn" value="Continue Payment">
                        </div>

                    </form>
                </div>
            </div>
        </div>
        <!--content-->
    </div>
    <!--content-->
@endsection
