@extends('layouts.master')
@section('content')
    <div class="banner1">
        <div class="container">
            <h3><a href="index.html">Home</a> / <span>Checkout</span></h3>
        </div>
    </div>
    <!--banner-->

    <!--content-->
    <div class="content">
        <div class="cart-items">
            <div class="container">
                <h2 class="text-center">My Shopping </h2>
                <table class="table table-striped table-hover ">
                    <thead>
                    <tr class="bg-primary">
                        <th>#</th>
                        <th>Product Name</th>
                        <th>Product Price</th>
                        <th>Product Quantity</th>
                        <th>Product Photo</th>
                        <th>Total Price</th>
                        <th>Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    @php($i=1)
                    @php($sum = 0)
                    @foreach($checkcart as $check )
                    <tr>
                        <td>{{ $i++ }}</td>
                        <td>{{ $check->name}}</td>
                        <td>${{ $check->price }}</td>
                        <td>
                            <form action="{{ route('update-cart') }}" method="post">
                                @csrf
                                <input type="number" name="qty" value="{{ $check->quantity }}" min="1">
                                <input type="hidden" name="id" value="{{ $check->id }}" min="1">
                                <input type="submit" name="btn" value="update">
                            </form>

                        </td>
                        <td>
                            <img src="{{ asset($check->attributes->image) }}" alt="" height="100" width="100">
                        </td>
                        <td>${{ $total = $check->price*$check->quantity }}</td>
                        <td>
                            <a href="{{route('delete-cart-item',['id'=>$check->id])}}" class="btn btn-warning btn-xs">
                                <span class="glyphicon glyphicon-trash"></span>
                            </a>
                        </td>
                    </tr>

                        <?php
                        $sum = $sum + $total;
                        ?>
                    @endforeach
                    </tbody>
                </table>
                <table class="table table-bordered">
                    <tr>
                        <th>Total Item's Price: </th>
                        <td> ${{ $sum }}</td>
                    </tr>
                    <tr>
                        <th>Vat:</th>
                        <td> ${{$vat = 0}}</td>
                    </tr>
                    <tr>
                        <th>Grand total:</th>
                        <td> ${{ $orderTotal = $sum + $vat }}</td>
                        <?php
                         Session::put('orderTotal',$orderTotal);
                        ?>
                    </tr>

                </table>


            </div>
            <div class="row">
                <div class="col-md-10 col-md-offset-1">
                    @if(Session::get('customerId') && Session::get('ShippingId'))
                        <a href="{{route('payment')}}" class="btn btn-success pull-right">Checkout</a>
                    @elseif(Session::get('customerId'))
                        <a href="{{route('checkout')}}" class="btn btn-success pull-right">Checkout</a>
                    @else
                        <a href="{{route('checkout-user')}}" class="btn btn-success pull-right">Checkout</a>
                    @endif
                    <a href="{{route('/')}}" class="btn btn-success">Continue Shoping</a>
                </div>
            </div>
        </div>
        <!-- checkout -->
    </div>
@endsection