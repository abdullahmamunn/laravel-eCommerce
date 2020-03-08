@extends('admin.admin-layouts.master')
@section('content')
    <div class="content-wrapper">
        <section class="content-header">
            <h1 class="text-center">
               Order Details For This Order
            </h1>
            <ol class="breadcrumb">
                <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
                <li><a href="#">Tables</a></li>
                <li class="active">Data tables</li>
            </ol>
        </section>
        <!-- Main content -->
        <section class="content">
            <div class="row">
                <div class="col-md-12">
                    <div class="box">
                        <div class="box-header">
                            <h3 class="text-center">Customer Information</h3>
                        </div>
                        <!-- /.box-header -->
                        <div class="box-body">
                           <table class="table table-striped table-bordered">
                               <tr>
                                   <th>Customer Name</th>
                                   <td>{{ $customer->username }}</td>
                               </tr>
                               <tr>
                                   <th>Email</th>
                                   <td>{{$customer->email}}</td>
                               </tr>
                               <tr>
                                   <th>Phone</th>
                                   <td>{{$customer->phone}}</td>
                               </tr>
                               <tr>
                                   <th>Address</th>
                                   <td>{{$customer->address}}</td>
                               </tr>
                           </table>
                        </div>
                        <!-- /.box-body -->
                    </div>
                    <!-- /.box -->
                </div>
                <!-- /.col -->
                <div class="col-md-12">
                    <div class="box">
                        <div class="box-header">
                            <h3 class="text-center">Shipping Information</h3>
                        </div>
                        <!-- /.box-header -->
                        <div class="box-body">
                            <table class="table table-striped table-bordered">
                                <tr>
                                    <th>Customer Name</th>
                                    <td>{{ $shipping->username }}</td>
                                </tr>
                                <tr>
                                    <th>Email</th>
                                    <td>{{ $shipping->email }}</td>
                                </tr>
                                <tr>
                                    <th>Phone</th>
                                    <td>{{ $shipping->phone }}</td>
                                </tr>
                                <tr>
                                    <th>Address</th>
                                    <td>{{ $shipping->address }}</td>
                                </tr>
                            </table>

                        </div>
                        <!-- /.box-body -->
                    </div>
                    <!-- /.box -->
                </div>
                <!-- /.col -->
                <div class="col-md-12">
                    <div class="box">
                        <div class="box-header">
                            <h3 class="text-center">Payment Information</h3>
                        </div>
                        <!-- /.box-header -->
                        <div class="box-body">
                            <table class="table table-striped table-bordered">
                                <tr>
                                    <th>Payment Type</th>
                                    <td>{{ $payment->payment_type }}</td>
                                </tr>
                                <tr>
                                    <th>Payment Status</th>
                                    <td>{{ $payment->payment_status }}</td>
                                </tr>
                            </table>

                        </div>
                        <!-- /.box-body -->
                    </div>
                    <!-- /.box -->
                </div>
                <!-- /.col -->
                <div class="col-md-12">
                    <div class="box">
                        <div class="box-header">
                            <h3 class="text-center">Order Information</h3>
                        </div>
                        <!-- /.box-header -->
                        <div class="box-body">
                            <table class="table table-striped table-bordered">
                                <tr>
                                    <th>Order No</th>
                                    <td>{{ $order->id }}</td>
                                </tr>
                                <tr>
                                    <th>Order Total</th>
                                    <td>{{ $order->order_total }}</td>
                                </tr>
                                <tr>
                                    <th>Order Status</th>
                                    <td>{{ $order->order_status }}</td>
                                </tr>
                                <tr>
                                    <th>Order Date</th>
                                    <td>{{ $order->created_at }}</td>
                                </tr>
                            </table>

                        </div>
                        <!-- /.box-body -->
                    </div>
                    <!-- /.box -->
                </div>
                <!-- /.col -->
                <div class="col-md-12">
                    <div class="box">
                        <div class="box-header">
                            <h3 class="text-center">Products Information</h3>
                        </div>
                        <!-- /.box-header -->
                        <div class="box-body">
                            <div class="table-responsive">
                                <table class="table table-bordered table-hover">
                                    <thead>
                                    <tr class="bg-primary">
                                        <th>SL</th>
                                        <th>Product Id</th>
                                        <th>Product Name</th>
                                        <th>Product Price</th>
                                        <th>Product Quantity</th>
                                        <th>Total price</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @php($i=1)
                                    @php($sum = 0)
                                    @foreach($orderDetails as $orderDetail)
                                    <tr>
                                        <td>{{ $i++ }}</td>
                                        <td>{{ $orderDetail->product_id }}</td>
                                        <td>{{ $orderDetail->product_name }}</td>
                                        <td>{{ $orderDetail->product_price }}</td>
                                        <td>{{ $orderDetail->product_quantity  }}</td>
                                        <td>{{ $total =  $orderDetail->product_price*$orderDetail->product_quantity }}</td>
                                    </tr>
                                        <?php
                                            $sum = $sum + $total;
                                        ?>
                                        @endforeach
                                    </tbody>
                                </table>
                                <h2 class="text-center">Total Price(TK) {{ $sum }} </h2>
                            </div>

                        </div>
                        <!-- /.box-body -->
                    </div>
                    <!-- /.box -->
                </div>
                <!-- /.col -->
            </div>
            <!-- /.row -->
        </section>
        <!-- /.content -->
    </div>
@stop