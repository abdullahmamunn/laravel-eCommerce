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
                            <h3 class="text-center">Order Details</h3>
                            <h3 class="text-green text-center" >{{ Session::get('message') }}</h3>
                        </div>
                        <!-- /.box-header -->
                        <div class="box-body">
                            <div class="table-responsive">
                                <table class="table table-bordered table-hover">
                                    <thead>
                                    <tr class="bg-primary">
                                        <th>SL</th>
                                        <th>Customer Name</th>
                                        <th>Order Total</th>
                                        <th>Order Date</th>
                                        <th>Order Status</th>
                                        <th>Payment Type</th>
                                        <th>Payment status</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @php($i=1)
                                        <tr>
                                            <td>{{ $i++ }}</td>
                                            <td>demo</td>
                                            <td>demo</td>
                                            <td>demo</td>
                                            <td>demo</td>
                                            <td>demo</td>
                                            <td>demo</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>

                        </div>
                        <!-- /.box-body -->
                    </div>
                    <!-- /.box -->
                </div>
                <!-- /.col -->
                <div class="col-md-12">
                    <div class="box">
                        <div class="box-header">
                            <h3 class="text-center">Order Details</h3>
                            <h3 class="text-green text-center" >{{ Session::get('message') }}</h3>
                        </div>
                        <!-- /.box-header -->
                        <div class="box-body">
                            <div class="table-responsive">
                                <table class="table table-bordered table-hover">
                                    <thead>
                                    <tr class="bg-primary">
                                        <th>SL</th>
                                        <th>Customer Name</th>
                                        <th>Order Total</th>
                                        <th>Order Date</th>
                                        <th>Order Status</th>
                                        <th>Payment Type</th>
                                        <th>Payment status</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @php($i=1)
                                    <tr>
                                        <td>{{ $i++ }}</td>
                                        <td>demo</td>
                                        <td>demo</td>
                                        <td>demo</td>
                                        <td>demo</td>
                                        <td>demo</td>
                                        <td>demo</td>
                                    </tr>
                                    </tbody>
                                </table>
                            </div>

                        </div>
                        <!-- /.box-body -->
                    </div>
                    <!-- /.box -->
                </div>
                <!-- /.col -->
                <div class="col-md-12">
                    <div class="box">
                        <div class="box-header">
                            <h3 class="text-center">Order Details</h3>
                            <h3 class="text-green text-center" >{{ Session::get('message') }}</h3>
                        </div>
                        <!-- /.box-header -->
                        <div class="box-body">
                            <div class="table-responsive">
                                <table class="table table-bordered table-hover">
                                    <thead>
                                    <tr class="bg-primary">
                                        <th>SL</th>
                                        <th>Customer Name</th>
                                        <th>Order Total</th>
                                        <th>Order Date</th>
                                        <th>Order Status</th>
                                        <th>Payment Type</th>
                                        <th>Payment status</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @php($i=1)
                                    <tr>
                                        <td>{{ $i++ }}</td>
                                        <td>demo</td>
                                        <td>demo</td>
                                        <td>demo</td>
                                        <td>demo</td>
                                        <td>demo</td>
                                        <td>demo</td>
                                    </tr>
                                    </tbody>
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