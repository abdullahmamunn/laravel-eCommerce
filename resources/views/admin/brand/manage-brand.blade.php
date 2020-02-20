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
                            <table id="example1" class="table table-bordered">
                                <thead>
                                <tr class="bg-primary">
                                    <th>SL</th>
                                    <th>Name</th>
                                    <th>Description</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                @php($i=1)
                                @foreach($brand as $brands )
                                    <tr>
                                        <td>{{ $i++ }}</td>
                                        <td>{{$brands->brand_name}}</td>
                                        <td>{{$brands->brand_description}}</td>
                                        <td>{{$brands->publication_status == 0 ? 'unpublished' : 'published'}}</td>
                                        <td>
                                            @if($brands->publication_status == 0)
                                                <a class="btn btn-warning btn-xs" href="{{route('published-brand',[
                                                'brand_id'=>$brands->id
                                                ])}}">
                                                    <span class="glyphicon glyphicon-arrow-down"></span>
                                                </a>
                                            @else
                                                <a class="btn btn-success btn-xs" href="{{route('unpublished-brand',[
                                                'brand_id'=>$brands->id
                                                ])}}">
                                                    <span class="glyphicon glyphicon-arrow-up"></span>
                                                </a>
                                            @endif
                                            <a class="btn btn-info btn-xs" href="{{route('edit-brand',['id'=>$brands->id])}}">
                                                <span class="glyphicon glyphicon-edit"></span>
                                            </a>
                                            <a class="btn btn-danger btn-xs" href="{{route('delete',['id'=>$brands->id])}}">
                                                <span class="glyphicon glyphicon-trash"></span>
                                            </a>
                                        </td>
                                    </tr>
                                @endforeach

                                </tbody>
                                <tfoot>
                                <tr>
                                    <th>SL</th>
                                    <th>Name</th>
                                    <th>Description</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                                </tfoot>
                            </table>
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