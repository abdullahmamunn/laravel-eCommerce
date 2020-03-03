@extends('layouts.master')
@section('content')
    <!--content-->
    <div class="content">
        <!--content-->
        <div class="content">
        <div class="row">
        <div class="col-md-12">
            <!--login-->
            <div class="login">
                <div class="main-agileits">
                    <div class="form-w3agile form1">
                        <h3>Register</h3>
                        <form action="{{route('user-signup')}}" method="post">
                            @csrf
                            <div class="key">
                                <i class="fa fa-user" aria-hidden="true"></i>
                                <input  type="text" value="Username" name="username" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Username';}" required="">
                                <div class="clearfix"></div>
                            </div>
                            <span class="text text-danger">{{ $errors->has('email') ? $errors->first('email') : ' ' }}</span>
                            <div class="key">
                                <i class="fa fa-envelope" aria-hidden="true"></i>
                                <input  type="text" value="Email" name="email" id="title" class="@error('title') is-invalid @enderror" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Email';}" required="">
                                <div class="clearfix"></div>
                            </div>

                            <div class="key">
                                <i class="fa fa-phone" aria-hidden="true"></i>
                                <input  type="text" value="Phone number" name="phone" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Email';}" required="">
                                <div class="clearfix"></div>
                            </div>
                            <div class="form-group">

                                <textarea class="form-control" type="text" placeholder="         Your Address" name="address"></textarea>
                                <div class="clearfix"></div>
                            </div>
                            <div class="key">
                                <i class="fa fa-lock" aria-hidden="true"></i>
                                <input  type="password" value="Password" name="password" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Password';}" required="">
                                <div class="clearfix"></div>
                            </div>
                            <input type="submit" value="Submit">
                        </form>
                    </div>

                </div>
            </div>
            <!--login-->
        </div>
        </div>
        </div>
        <!--content-->
    </div>
    <!--content-->
@endsection
