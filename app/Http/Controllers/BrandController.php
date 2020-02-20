<?php

namespace App\Http\Controllers;

use App\brand;
use Illuminate\Http\Request;

class BrandController extends Controller
{
    public function index()
    {
        return view('admin.brand.add-brand');
    }

    public function storeBrand(Request $request)
    {
        $validateData = $request->validate([
            'brand_name'=>'required',
            'brand_description'=>'required',
            'brand_status'=>'required'
        ]);
        //return $request->all();
        $brand = new brand();
        $brand->brand_name = $request->brand_name;
        $brand->brand_description = $request->brand_description;
        $brand->publication_status = $request->brand_status;
        $brand->save();
        return redirect('admin/manage/brand');
    }

    public function manageBrand()
    {
       $brands =  brand::all();
//       return $brands->all();
       return view('admin.brand.manage-brand',[
           'brand'=>$brands
       ]);
    }

    public function publishedBrand($brand_id)
    {
       // return $id.$name;
        $brand = brand::find($brand_id);
        $brand->publication_status = 1;
        $brand->save();
        return redirect('admin/manage/brand')->with('message','Brand published successfully!');
    }

    public function unpublishedBrand($brand_id)
    {
//        return $brand_id;
        $brand = brand::find($brand_id);
        $brand->publication_status = 0;
        $brand->save();
        return redirect('admin/manage/brand')->with('message','Brand unpublished successfully!');
    }

    public function DeleteBrand($id)
    {
        $delete_brand = brand::find($id);
        $delete_brand->delete();
        return redirect('admin/manage/brand')->with('message','Brand deleted successfully!');

    }

    public function updateBrand($id)
    {
        $brans = brand::find($id);
        return view('admin.brand.update-brand',['brand'=>$brans]);
    }

    public function submitBrand(Request $request)
    {
        $brand = brand::find($request->brand_id);
        $brand->brand_name = $request->brand_name;
        $brand->brand_description = $request->brand_description;
        $brand->publication_status = $request->brand_status;
        $brand->save();
        return redirect('admin/manage/brand')->with('message','Brand updated successfully!');
    }
}
