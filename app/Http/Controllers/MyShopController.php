<?php

namespace App\Http\Controllers;

use App\brand;
use App\category;
use App\product;
use RealRashid\SweetAlert\Facades\Alert;

use Illuminate\Http\Request;


class MyShopController extends Controller
{
    public function index()
    {
        $products = product::where('publication_status',1)
                 ->orderBy('id', 'DESC')
                 ->take(8)
                 ->get();
        //return $products;
       // Alert::alert('welcome', 'Message', 'Welcome to Dashboard');
        return view('welcome',[
            'product'=>$products,
        ]);
    }


    public function products($id,$category_name)
    {
        $categories = product::where('category_id',$id)
                ->where('publication_status',1)
                ->get();
        //return $categories;
        return view('category.products.products-category',[
            'categoryProducts'=>$categories,
            'category_name'=>$category_name
        ]);

//        return view('category.products.womens.womens_category',[
//            'categoryProducts'=>$categories
//        ]);
    }

    public function productDetails($id)
    {
        $product_details = product::find($id);
        return view('category.products.details',[
            'details'=>$product_details
        ]);
    }




}
