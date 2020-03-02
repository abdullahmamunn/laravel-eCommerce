<?php

namespace App\Http\Controllers;

use App\brand;
use App\category;
use App\product;
use Image;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class ProductController extends Controller
{
    public function index()
    {
        $categories = category::where('cat_status',1)->get();
        $brands       = brand::where('publication_status',1)->get();
        //return $categories;
         //echo $categories."<br>"."<br>".$brand;
        return view('admin.product.add-product',[
            'category'=>$categories,
            'brand'=>$brands
        ]);
    }
    protected function ValidateProductInfo($request)
    {
        $validateData = $request->validate([
            'category_id'       =>'required',
            'brand_id'          =>'required',
            'product_name'      =>'required',
            'product_price'     =>'required',
            'product_quantity'  =>'required',
            'product_description'=>'required',
            'image'              =>'required',
            'publication_status' =>'required'
        ]);
    }

    protected function UploadImage($request)
    {
        $productImage = $request->file('image');
        $fileType     = $productImage->getClientOriginalExtension();
        $imageName    = $request->product_name.'.'.$fileType;
        $directory    = 'product-Images/';
        $imageUrl     =  $directory.$imageName;
        Image::make($productImage)->resize(200, 300)->save($imageUrl);

        //$productImage->move($directory,$imageName);
        return $imageUrl;
    }

    public function StoreProduct(Request $request)
    {
      $this->ValidateProductInfo($request);
      $imageUrl = $this->UploadImage($request);

      $products = new product();
      $products->category_id         = $request->category_id;
      $products->brand_id            = $request->brand_id;
      $products->product_name        = $request->product_name;
      $products->product_price       = $request->product_price;
      $products->product_quantity    = $request->product_quantity;
      $products->product_description = $request->product_description;
      $products->image               = $imageUrl;
      $products->publication_status  = $request->publication_status;
      $products->save();
      return redirect('admin/manage/products')->with('message','New product added successfully!');

    }

    public function ManageProduct()
    {
        $products = DB::table('products')
                    ->join('categories','products.category_id', '=', 'categories.id')
                    ->join('brands','products.brand_id', '=', 'brands.id')
                    ->select('products.*','categories.cat_name','brands.brand_name')
                    ->get();
       //$products =  product::all();
       //return $products;
        return view('admin.product.manage-product',[
            'product'=>$products
        ]);
    }

    public function EditProducts($id)
    {
       $product    = product::find($id);
       $categories = category::where('cat_status',1)->get();
//                               ->where('id',$category_id)
//                               ->select('categories.*','cat_name')
//                               ->get();
       $brands      = brand::where('publication_status',1)->get();
//                               ->where('id',$brand_id)
//                               ->select('brands.*','brand_name')
//                               ->get();
       //return $categories."<br>".$brands."<br>".$product;
        return view('admin.product.edit-product',[
            'product' =>$product,
            'category'=>$categories,
            'brand'   =>$brands
        ]);
    }

    public function imageUpdate($product,$request,$imageUrl = null)
    {
        $product->category_id         = $request->category_id;
        $product->brand_id            = $request->brand_id;
        $product->product_name        = $request->product_name;
        $product->product_price       = $request->product_price;
        $product->product_quantity    = $request->product_quantity;
        $product->product_description = $request->product_description;
        if ($imageUrl){
            $product->image            = $imageUrl;
        }
        $product->publication_status  = $request->publication_status;
        $product->save();
    }

    public function UpdateProducts(Request $request)
    {
//      $img = $_FILES['image'];
//        echo '<pre>';
//        print_r($img);
//       $img = $request->file('image');
//       echo '<pre>';
//       print_r($img);
        $productImage = $request->file('image');
        $product = product::find($request->product_id);
        if ($productImage)
        {
            @unlink(public_path().$product->image);
            $fileType     = $productImage->getClientOriginalExtension();
            $imageName    = $request->product_name.'.'.$fileType;
            $directory    = 'product-Images/';
            $imageUrl     =  $directory.$imageName;
            Image::make($productImage)->resize(200, 300)->save($imageUrl);
            echo $imageUrl;
            $this->imageUpdate($product,$request,$imageUrl);
        }
        else
        {
            $this->imageUpdate($product, $request);
        }
        return redirect('admin/manage/products')->with('message','Product updated successfully!');

    }

    public function DeleteProducts($id)
    {
       $delete = product::find($id);
       //return $delete;
        $delete->delete();
        return redirect('admin/manage/products')->with('message','Product deleted successfully!');
    }
}
