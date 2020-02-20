@extends('admin.admin-layouts.master')
@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
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
       <section class="content">
           <div class="row">
               <div class="col-md-10 col-md-offset-1">
                   <div class="panel panel-default">
                       <div class="panel-heading">
                           <h1 class="text-center text-capitalize">Edit Categories</h1>
                       </div>
                       <div class="panel-body">
                           <form action="{{route('update')}}" method="post" class="form-horizontal">
                               @csrf
                               <fieldset>
                                   <div class="form-group">
                                       <label class="col-md-4 control-label">Category Name</label>
                                       <div class="col-md-8">
                                           <input type="text" class="form-control" name="category_name" placeholder="Category Name" value="{{ $category->cat_name }}">
                                           <input type="hidden" class="form-control" name="category_id" placeholder="Category Name" value="{{ $category->id }}">

                                       </div>
                                   </div>

                                   <div class="form-group">
                                       <label class="col-md-4 control-label">Category Description</label>
                                       <div class="col-md-8">
                                           <textarea class="form-control"  name="category_description">{{ $category->cat_description }}</textarea>
                                       </div>
                                   </div>

                                   <div class="form-group">
                                       <label class="col-md-4 control-label">Category Status</label>
                                       <div class="col-md-8 radio">
                                           <label><input type="radio" name="publication_status" {{$category->cat_status == 1 ?  'checked' : ''}} value="1">Publish</label>
                                           <label> <input type="radio" name="publication_status" {{$category->cat_status == 0 ?  'checked' : ''}} value="0">Unpublish</label>
                                       </div>
                                   </div>
                                   <div class="form-group">
                                       <div class="col-md-8 col-md-offset-9">
                                           <a href="" class="btn btn-default">Cancel</a>
                                           <button type="submit" class="btn btn-info">Submit</button>
                                       </div>
                                   </div>
                               </fieldset>
                           </form>
                       </div>
                   </div>
               </div>
           </div>
       </section>

    </div>
    @stop