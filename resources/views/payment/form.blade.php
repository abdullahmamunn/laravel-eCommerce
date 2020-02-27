@extends('layouts.master')
@section('content')
    <!--content-->
    <div class="content">
        <!--content-->
        <div class="content">
            <div class="well">
                <h2 class="text-success text-center">Payment Method </h2> <br>
                <p class="text-success text-center">Please selsect only <strong>One Method</strong></p>
            </div>
            <div class="row">
                <div class="col-md-6 col-md-offset-3 well">
                    <p>Dear {{ Session::get('Username') }}</p>
                    <form action="{{ route('mew-order') }}" method="post">
                        @csrf
                       <table class="table table-bordered">
                           <tr>
                               <th>Cash on Delivery</th>
                               <td><input type="radio" name="payment_type" value="cash"> Cash on Delivery
                                   <img src="{{asset('front-end/images/bkash.jpg')}}" alt="" height="50" width="150">
                               </td>
                           </tr>
                           <tr>
                               <th>Cash on Delivery</th>
                               <td>
                                   <input type="radio" name="payment_type" value="paypal"> Paypal
                                   <img src="{{asset('front-end/images/bkash.jpg')}}" alt="" height="50" width="150">
                               </td>
                           </tr>
                           <tr>
                               <th>Bkash</th>
                               <td><input type="radio" name="payment_type" value="bkash"> Bkash
                                   <img src="{{asset('front-end/images/bkash.jpg')}}" alt="" height="50" width="150">
                               </td>
                           </tr>
                           <tr>
                               <th>Roket</th>
                               <td><input type="radio" name="payment_type" value="roket"> Roket
                                   <img src="{{asset('front-end/images/bkash.jpg')}}" alt="" height="50" width="150">
                               </td>
                           </tr>
                           <tr>
                               <th></th>
                               <td> <input type="submit" class="btn btn-success" name="btn" value="Confirm order"></td>
                           </tr>
                       </table>

                    </form>
                </div>
            </div>
        </div>
        <!--content-->
    </div>
    <!--content-->
@endsection
