<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>AdminLTE 2 | Invoice</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Bootstrap 3.3.7 -->
    <link rel="stylesheet" href="{{asset('back-end/bower_components/bootstrap/dist/css/bootstrap.min.css')}}">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{asset('back-end/back-end/bower_components/font-awesome/css/font-awesome.min.css')}}">
    <!-- Ionicons -->
    <link rel="stylesheet" href="{{asset('back-end/back-end/bower_components/Ionicons/css/ionicons.min.css')}}">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{asset('back-end/public/back-end/dist/css/AdminLTE.min.css')}}">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->

    <!-- Google Font -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>
<body onload="window.print();">
<div class="wrapper">
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
                    <strong>Admin, Inc.</strong><br>
                    795 Folsom Ave, Suite 600<br>
                    San Francisco, CA 94107<br>
                    Phone: (804) 123-5432<br>
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
                    Etsy doostang zoodles disqus groupon greplin oooj voxy zoodles, weebly ning heekya handango imeem plugg dopplr
                    jibjab, movity jajah plickers sifteo edmodo ifttt zimbra.
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
    </section>
    <!-- /.content -->
</div>
<!-- ./wrapper -->
</body>
</html>
