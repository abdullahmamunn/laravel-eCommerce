@extends('layouts.master')
@section('content')
    <!--content-->
    <div class="content">
        <!--content-->
        <div class="content">
            <div class="well">
                <h2 class="text-success text-center">Shipping Details</h2>
            </div>
            <div class="row">
                <div class="col-md-6 col-md-offset-3">
                    <p>Dear {{ Session::get('Username') }}</p>
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
                            <input type="submit" class="btn btn-success" name="btn" value="continue pyment">
                        </div>

                    </form>
                </div>
            </div>
        </div>
        <!--content-->
    </div>
    <!--content-->
@endsection
