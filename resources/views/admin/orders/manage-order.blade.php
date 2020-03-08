@extends('admin.admin-layouts.master')
@section('content')
    <div class="content-wrapper">
        <section class="content-header">
            <h1>
                Data Tables
                <small>advanced tables</small>
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
                            <h3 class="text-center">Manage Orders</h3>
                            <h3 class="text-green text-center" >{{ Session::get('message') }}</h3>
                        </div>
                        <!-- /.box-header -->
                        <div class="box-body">
                            <div class="table-responsive">
                                <table id="example1" class="table table-bordered table-hover">
                                    <thead>
                                    <tr class="bg-primary">
                                        <th>SL</th>
                                        <th>Customer Name</th>
                                        <th>Order Total</th>
                                        <th>Order Date</th>
                                        <th>Order Status</th>
                                        <th>Payment Type</th>
                                        <th>Payment status</th>
                                        <th>Action</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @php($i=1)
                                    @foreach($order as $user_orders)
                                        <tr>
                                            <td>{{ $i++ }}</td>
                                            <td>{{ $user_orders->username }}</td>
                                            <td>{{ $user_orders->order_total }}</td>
                                            <td>{{ $user_orders->created_at }}</td>
                                            <td>{{ $user_orders->order_status }}</td>
                                            <td>{{ $user_orders->payment_type }}</td>
                                            <td>{{ $user_orders->payment_status }}</td>

                                            <td>
                                                <a class="btn btn-info btn-xs" href="{{route('order-details',['id'=>$user_orders->id])}}">
                                                    <span class="glyphicon glyphicon-zoom-in"></span>
                                                </a>
                                                <a class="btn btn-success btn-xs" href="{{ route('order-invoice',['id'=>$user_orders->id]) }}" title="invoice">
                                                    <span class="fa fa-file-archive-o"></span>
                                                </a>
                                                <a class="btn btn-success btn-xs" href="">
                                                    <span class="glyphicon glyphicon-download"></span>
                                                </a>
                                                <a class="btn btn-primary btn-xs" href="">
                                                    <span class="glyphicon glyphicon-edit"></span>
                                                </a>
                                                <a class="btn btn-danger btn-xs" href="{{ route('delete-order',['id'=>$user_orders->id]) }}">
                                                    <span class="glyphicon glyphicon-trash"></span>
                                                </a>
                                            </td>
                                        </tr>
                                     @endforeach
                                    </tbody>
                                    <tfoot>
                                    <tr>
                                        <th>SL</th>
                                        <th>Customer Name</th>
                                        <th>Order Total</th>
                                        <th>Order Date</th>
                                        <th>Order Status</th>
                                        <th>Payment Type</th>
                                        <th>Payment status</th>
                                        <th>Action</th>
                                    </tr>
                                    </tfoot>
                                </table>
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