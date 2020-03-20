@extends('admin.admin-layouts.master')
@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
               New Shop
                <small>Category</small>
            </h1>

        </section>
       <section class="content">
           <div class="row">
               <div class="col-md-8 col-md-offset-2">
                   <div class="panel panel-default">
                       <div class="panel-heading">
                           <h1 class="text-center text-capitalize">Add new Categories</h1>
                       </div>
                       {{--@if ($errors->any())--}}
                           {{--<div class="alert alert-danger">--}}
                               {{--<ul>--}}
                                   {{--@foreach ($errors->all() as $error)--}}
                                       {{--<li>{{ $error }}</li>--}}
                                   {{--@endforeach--}}
                               {{--</ul>--}}
                           {{--</div>--}}
                       {{--@endif--}}
                       <div class="panel-body">
                           <form action="{{route('store')}}" method="post" class="form-horizontal">
                               @csrf
                               <fieldset>
                                   <div class="form-group">
                                       <label class="col-md-4 control-label">Category Name</label>
                                       <div class="col-md-8">
                                           <input type="text" class="form-control" name="category_name" placeholder="Category Name" value="{{ old('category_name') }}">
                                           <span class="text text-danger">{{ $errors->has('category_name') ? $errors->first('category_name') : ' ' }}</span>
                                       </div>
                                   </div>

                                   <div class="form-group">
                                       <label class="col-md-4 control-label">Category Description</label>
                                       <div class="col-md-8">
                                           <textarea class="form-control"  name="category_description"></textarea>
                                           <span class="teat text-danger">{{ $errors->has('category_description') ? $errors->first('category_description') : ' ' }}</span>
                                       </div>
                                   </div>

                                   <div class="form-group">
                                       <label class="col-md-4 control-label">Category Status</label>
                                       <div class="col-md-8 radio">
                                           <label><input type="radio"  name="publication_status" value="1">Publish</label>
                                           <label> <input type="radio" name="publication_status" value="0">Unpublished</label>
                                           <br>
                                           <span class="text text-danger"> {{ $errors->has('publication_status') ? $errors->first('publication_status') : ' ' }}</span>
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