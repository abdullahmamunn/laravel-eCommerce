@extends('admin.admin-layouts.master')
@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
               New Shop
                <small>Manage Category</small>
            </h1>
        </section>

        <!-- Main content -->
        <section class="content">
            <div class="row">
                <div class="col-md-12">
                    <div class="box">
                        <div class="box-header">
                            <h3 class="text-center">Category Manages</h3>
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
                                @foreach($category as $cat )
                                <tr>
                                    <td>{{ $i++ }}</td>
                                    <td>{{$cat->cat_name}}</td>
                                    <td>{{$cat->cat_description}}</td>
                                    <td>{{$cat->cat_status == 1? 'published' : 'unpublished'}}</td>
                                    <td>
                                        @if($cat->cat_status == 1)
                                        <a class="btn btn-success btn-xs" href="{{route('unpublished-category',[
                                        'id'=>$cat->id,
                                        ])}}">
                                            <span class="glyphicon glyphicon-arrow-up"></span>
                                        </a>
                                        @else
                                            <a class="btn btn-warning btn-xs" href="{{route('published-category',[
                                             'id'=>$cat->id,
                                            ])}}">
                                                <span class="glyphicon glyphicon-arrow-down"></span>
                                            </a>
                                        @endif
                                        <a class="btn btn-info btn-xs" href="{{route('edit-category',['id'=>$cat->id])}}">
                                            <span class="glyphicon glyphicon-edit"></span>
                                        </a>
                                        <a class="btn btn-danger btn-xs" href="{{route('delete-category',['id'=>$cat->id])}}">
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
    <!-- /.content-wrapper -->
    @stop