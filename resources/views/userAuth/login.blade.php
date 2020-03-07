@extends('layouts.master')
@section('content')
    <!--content-->
    <div class="content">
        <!--login-->
        <div class="well">
            <h3 class="text-center text-success">Please Login to Complete Your order. If you do not have register, <br> <p>Please click here for</p> <strong><a
                            href="{{route('/register')}}">Register</a></strong> </h3>
        </div>

        <div class="login">
            <div class="main-agileits">
                <div class="form-w3agile">
                    <h3>Login To New Shop</h3>
                    <form action="{{ route('customer-login') }}" method="post">
                        @csrf
                        <span class="text text-danger">{{ $errors->has('email') ? $errors->first('email') : ' ' }}</span>
                        <div class="key">
                            <i class="fa fa-envelope" aria-hidden="true"></i>
                            <input  type="text" value="{{ old('email') }}" name="email" placeholder="Email" >

                            <div class="clearfix"></div>
                        </div>
                        <span class="text text-danger">{{ $errors->has('password') ? $errors->first('password') : ' ' }}</span>
                        <div class="key">
                            <i class="fa fa-lock" aria-hidden="true"></i>
                            <input  type="password" name="password" placeholder="Password" >
                            <div class="clearfix"></div>
                        </div>
                        <input type="submit" value="Login">
                    </form>
                </div>
                <div class="forg">
                    <a href="#" class="forg-left">Forgot Password</a>
                    <div class="clearfix"></div>
                </div>
            </div>
        </div>
        <!--login-->
    </div>
    <!--content-->
@endsection
