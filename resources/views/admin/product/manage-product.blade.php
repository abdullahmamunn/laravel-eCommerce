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
                            <h3 class="box-title">Data Table With Full Features</h3>
                            <h3 class="text-green text-center" >{{ Session::get('message') }}</h3>
                        </div>
                        <!-- /.box-header -->
                        <div class="box-body">
                            <div class="table-responsive">
                                <table id="example1" class="table table-bordered table-hover">
                                    <thead>
                                    <tr class="bg-primary">
                                        <th>SL</th>
                                        <th>Category Name</th>
                                        <th>Brand Name</th>
                                        <th>Product Name</th>
                                        <th>Product Price</th>
                                        <th>Product Image</th>
                                        <th>Product Quantity</th>
                                        <th>Product Status</th>
                                        <th>Action</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @php($i=1)
                                    @foreach($product as $product)
                                    <tr>
                                        <td>{{ $i++ }}</td>
                                        <td>{{$product->cat_name}}</td>
                                        <td>{{$product->brand_name}}</td>
                                        <td>{{$product->product_name}}</td>
                                        <td>{{$product->product_price}}</td>
                                        <td><img src="{{asset($product->image)}}" alt="" height="100" width=100"> </td>
                                        <td>{{$product->product_quantity}}</td>
                                        <td>{{$product->publication_status}}</td>
                                        <td>
                                            <a class="btn btn-warning btn-xs" href="">
                                                <span class="glyphicon glyphicon-arrow-down"></span>
                                            </a>
                                            <a class="btn btn-info btn-xs" href="{{route('edit-products',[
                                            'id'=>$product->id

                                            ])}}">
                                                <span class="glyphicon glyphicon-edit"></span>
                                            </a>
                                            <a class="btn btn-danger btn-xs" href="{{route('delete-product',['id'=>$product->id])}}">
                                                <span class="glyphicon glyphicon-trash"></span>
                                            </a>
                                        </td>
                                    </tr>
                                    @endforeach
                                    </tbody>
                                    <tfoot>
                                    <tr>
                                        <th>SL</th>
                                        <th>Category Name</th>
                                        <th>Brand Name</th>
                                        <th>Product Name</th>
                                        <th>Product Price</th>
                                        <th>Product Image</th>
                                        <th>Product Quantity</th>
                                        <th>Product Status</th>
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