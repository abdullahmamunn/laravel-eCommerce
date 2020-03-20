@extends('admin.admin-layouts.master')
@section('content')
    <div class="content-wrapper">
        <section class="content-header margin-bottom">
            <h1>
                New Shop
                <small>Product add</small>
            </h1>
        </section>
     <div class="row">
         <div class="col-md-10 col-md-offset-1">
             <div class="panel panel-default">
                 <div class="panel-heading panel-primary">
                     <h3 class="text text-capitalize">Add product</h3>
                     <h3 class="text-green text-center" >{{ Session::get('message') }}</h3>
                 </div>
                 <div class="panel-body">
                     <form action="{{route('store-product')}}" method="post" class="form-horizontal" enctype="multipart/form-data">
                         @csrf
                         <fieldset>
                             <div class="form-group">
                                 <label class="col-md-2 control-label">Category Name</label>
                                 <div class="col-md-8">
                                     <select class="form-control" name="category_id">
                                         <option>------Select Category Name------</option>
                                         @foreach($category as $category)
                                         <option value="{{ $category->id }}">{{ $category->cat_name }}</option>
                                         @endforeach
                                     </select>
                                     <span class="text text-danger">{{ $errors->has('category_id') ? $errors->first('category_id') : ''}}</span>
                                 </div>
                             </div>
                             <div class="form-group">
                                 <label class="col-md-2 control-label">Brand Name</label>
                                 <div class="col-md-8">
                                     <select class="form-control" name="brand_id">
                                         <option>------Select Brand Name------</option>
                                         @foreach($brand as $brand)
                                         <option value="{{ $brand->id }}">{{ $brand->brand_name }}</option>
                                         @endforeach
                                     </select>
                                     <span class="text text-danger">{{ $errors->has('brand_id') ? $errors->first('brand_id') : ''}}</span>
                                 </div>
                             </div>

                             <div class="form-group">
                                 <label class="col-md-2 control-label">Product Name</label>
                                 <div class="col-md-8">
                                     <input type="text" class="form-control" name="product_name" placeholder="product name" value="{{ old('product_name') }}">
                                     <span class="text text-danger">{{ $errors->has('product_name') ? $errors->first('product_name') : ''}}</span>
                                 </div>
                             </div>
                             <div class="form-group">
                                 <label class="col-md-2 control-label">Product price</label>
                                 <div class="col-md-8">
                                     <input type="text" class="form-control" name="product_price" placeholder="product price" value="{{old('product_price')}}">
                                     <span class="text text-danger">{{ $errors->has('product_price') ? $errors->first('product_price') : ''}}</span>
                                 </div>
                             </div>
                             <div class="form-group">
                                 <label class="col-md-2 control-label">Product quantity</label>
                                 <div class="col-md-8">
                                     <input type="number" class="form-control" name="product_quantity" placeholder="product quantity" value="{{old('product_quantity')}}">
                                     <span class="text text-danger">{{ $errors->has('product_quantity') ? $errors->first('product_quantity') : ''}}</span>
                                 </div>
                             </div>
                             <div class="form-group">
                                 <label for="textArea" class="col-md-2 control-label">Description</label>
                                 <div class="col-md-8">
                                     <textarea id="editor" class="form-control" rows="3" name="product_description"></textarea>
                                     <span class="text text-danger">{{ $errors->has('product_description') ? $errors->first('product_description') : ''}}</span>
                                 </div>
                             </div>

                             <div class="form-group">
                                 <label for="inputFile" class="col-md-2 control-label">Product Image</label>
                                 <div class="col-md-8">
                                     <input type="file" name="image" accept="image/*">
                                     <span class="text text-danger">{{ $errors->has('image') ? $errors->first('image') : ''}}</span>
                                 </div>
                             </div>
                             <div class="form-group">
                                 <label class="col-md-2 control-label">Publication Status</label>
                                 <div class="col-md-8">
                                     <div class="radio radio-primary">
                                         <label><input type="radio"  name="publication_status" value="1">Published</label>
                                         <label> <input type="radio" name="publication_status" value="0">Unpublished</label>
                                         <br>
                                         <span class="text text-danger">{{ $errors->has('publication_status') ? $errors->first('publication_status') : ''}}</span>
                                     </div>
                                 </div>
                             </div>

                             <div class="form-group ">
                                 <div class="col-md-8 col-md-offset-2">
                                     <button type="button" class="btn btn-default">Cancel</button>
                                     <button type="submit" class="btn btn-primary">Submit</button>
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