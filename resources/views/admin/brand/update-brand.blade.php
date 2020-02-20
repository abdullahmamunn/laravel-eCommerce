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
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h2 class="text text-capitalize">Update Brand</h2>
                    </div>
                    <div class="panel-body">
                        <form action="{{route('update-brand')}}" method="post" class="form-horizontal">
                            @csrf
                            <fieldset>
                                <div class="form-group">
                                    <label class="col-md-4 control-label">Brand Name</label>
                                    <div class="col-md-8">
                                        <input type="text" class="form-control" name="brand_name" placeholder="Brand Name" value="{{ $brand->brand_name }}">
                                        <input type="text" class="form-control" name="brand_id" placeholder="Brand Name" value="{{ $brand->id }}">
                                        <span class="text text-danger">{{ $errors->has('brand_name') ? $errors->first('brand_name') : ' ' }}</span>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="col-md-4 control-label">Brand Description</label>
                                    <div class="col-md-8">
                                        <textarea class="form-control"  name="brand_description">{{ $brand->brand_description }}</textarea>
                                        <span class="teat text-danger">{{ $errors->has('brand_description') ? $errors->first('brand_description') : ' ' }}</span>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="col-md-4 control-label">Brand Status</label>
                                    <div class="col-md-8 radio">
                                        <label><input type="radio"  name="brand_status" {{ $brand->publication_status == 0 ? ' ' : 'checked'  }}  value="1">Publish</label>
                                        <label> <input type="radio" name="brand_status" {{ $brand->publication_status == 1? ' ' : 'checked' }} value="0">unpublished</label>
                                        <br>
                                        <span class="text text-danger"> {{ $errors->has('brand_status') ? $errors->first('brand_status') : ' ' }}</span>
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
    </div>
@stop