@extends('admin.admin-layouts.master')
@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                Invoice
                <small>#007612</small>
            </h1>
            <ol class="breadcrumb">
                <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
                <li><a href="#">Examples</a></li>
                <li class="active">Invoice</li>
            </ol>
        </section>

        <div class="pad margin no-print">
            <div class="callout callout-info" style="margin-bottom: 0!important;">
                <h4><i class="fa fa-info"></i> Note:</h4>
                This page has been enhanced for printing. Click the print button at the bottom of the invoice to test.
            </div>
        </div>

        <!-- Main content -->
        <section class="invoice">
            <!-- title row -->
            <div class="row">
                <div class="col-xs-12">
                    <h2 class="page-header">
                        <i class="fa fa-globe"></i> New Shop, Inc.
                        <small class="pull-right ">
                            <?php
                            echo "Date: " . date("Y/m/d") . "<br>";
                            date_default_timezone_set("Asia/Dhaka");
                            echo "Time: " . date("h:i:sa")."<br>";
                            echo "Day: " . date("l");
                            ?>
                        </small>
                    </h2>
                </div>
                <!-- /.col -->
            </div>
            <!-- info row -->
            <div class="row invoice-info">
                <div class="col-sm-4 invoice-col">
                    From
                    <address>
                        <strong>New Shop, Inc.</strong><br>
                        Rupnagar R/A Mirpur-2<br>
                        Road: 19/3<br>
                        Phone: 01982326583<br>
                        Email: info@almasaeedstudio.com
                    </address>
                </div>
                <!-- /.col -->
                <div class="col-sm-4 invoice-col">
                    To
                    <address>
                        <strong>{{ $customer->username }}</strong><br>
                       {{ $customer->address }}<br>
                        {{ $customer->phone }}<br>
                       {{ $customer->email }}
                    </address>
                </div>
                <!-- /.col -->
                <div class="col-sm-4 invoice-col">
                    <b>Invoice #007612</b><br>
                    <br>
                    <b>Order ID:</b> {{ $order->id }}<br>
                    <b>Payment Date:</b> {{ $payment->created_at }}<br>
                    <b>Account:</b> 968-34567
                </div>
                <!-- /.col -->
            </div>
            <!-- /.row -->

            <!-- Table row -->
            <div class="row">
                <div class="col-xs-12 table-responsive">
                    <table class="table table-striped">
                        <thead>
                        <tr>
                            <th>SL</th>
                            <th>Product Name</th>
                            <th>Product Id</th>
                            <th>Product Quantity</th>
                            <th>Product Price</th>
                            <th>Subtotal</th>
                        </tr>
                        </thead>
                        <tbody>
                        @php($sum = 0)
                        @php($item = 1)
                        @foreach($orderDetails as $orderDetail)
                        <tr>
                            <td>{{ $item++ }}</td>
                            <td>{{ $orderDetail->product_name }}</td>
                            <td>{{ $orderDetail->product_id  }}</td>
                            <td>{{ $orderDetail->product_quantity }}</td>
                            <td>{{ $orderDetail->product_price }}</td>
                            <td>{{ $total = $orderDetail->product_price*$orderDetail->product_quantity }}</td>
                        </tr>
                            @php( $sum = $sum + $total)
                        @endforeach
                        </tbody>
                    </table>
                </div>
                <!-- /.col -->
            </div>
            <!-- /.row -->

            <div class="row">
                <!-- accepted payments column -->
                <div class="col-xs-6">
                    <p class="lead">Payment Methods:</p>
                    <img src="{{asset('back-end/dist/img/credit/visa.png')}}" alt="Visa">
                    <img src="{{asset('back-end/dist/img/credit/mastercard.png')}}" alt="Mastercard">
                    <img src="{{asset('back-end/dist/img/credit/american-express.png')}}" alt="American Express">
                    <img src="{{asset('back-end/dist/img/credit/paypal2.png')}}" alt="Paypal">
                    <p class="text-muted well well-sm no-shadow" style="margin-top: 10px;">
                        Etsy doostang zoodles disqus groupon greplin oooj voxy zoodles, weebly ning heekya handango imeem plugg
                        dopplr jibjab, movity jajah plickers sifteo edmodo ifttt zimbra.
                    </p>
                </div>
                <!-- /.col -->
                <div class="col-xs-6">
                    <p class="lead">Amount Due</p>

                    <div class="table-responsive">
                        <table class="table">
                            <tr>
                                <th style="width:50%">Subtotal:</th>
                                <td>{{ $sum }}</td>
                            </tr>
                            <tr>
                                <th>Tax (9.3%)</th>
                                <td>{{ $tax = 10 }}</td>
                            </tr>
                            <tr>
                                <th>Shipping:</th>
                                <td>{{ $shipping_cost = 20 }}</td>
                            </tr>
                            <tr>
                                <th>Total:</th>
                                <td>{{ $total_amount = $sum + $tax + $shipping_cost  }}</td>
                            </tr>
                        </table>
                    </div>
                </div>
                <!-- /.col -->
            </div>
            <!-- /.row -->

            <!-- this row will not appear when printing -->
            <div class="row no-print">
                <div class="col-xs-12">
                    <a href="" onclick="print()" target="_blank" class="btn btn-default"><i class="fa fa-print"></i> Print</a>
                    <a href="{{route('download-invoice',['id'=>$order->id])}}" class="btn btn-primary pull-right"> <i class="fa fa-download"></i> Generate PDF</a>
                </div>
            </div>
        </section>
        <!-- /.content -->
        <div class="clearfix"></div>
    </div>
    <!-- /.content-wrapper -->
@endsection