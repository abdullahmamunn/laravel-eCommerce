<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProductsController extends Controller
{
    public function index($main_category, $sub_category)
    {
        return view('products');
    }

}
