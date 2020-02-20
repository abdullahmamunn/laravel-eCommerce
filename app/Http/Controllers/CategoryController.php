<?php

namespace App\Http\Controllers;

use App\category;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index()
    {
        return view('admin.add-category');
   }
   public function StoreCategory(Request $request)
    {
        $validatedData = $request->validate([
            'category_name'        =>'required',
            'category_description' =>'required|max:100',
            'publication_status'   =>'required'
        ]);

       $category = new category();
       $category ->cat_name        = $request->category_name;
       $category ->cat_description = $request->category_description;
       $category ->cat_status      = $request->publication_status;
       $category->save();
        Alert::success('well done!', 'Category added successfully!');


        return redirect('admin/manage/category');

   }

    public function manageCategory()
    {
        $categories = category::all();

        return view('admin.manage-category',[
            'category' => $categories
        ]);
    }
    public function UnpublishedCategory($id)
    {
       $category = category::find($id);
       $category->cat_status = 0;
       $category->save();
        // example:
        alert()->success('Category Unpublished?')->showConfirmButton('Yes', '#3085d6');

        return redirect('admin/manage/category');
    }
    public function publishedCategory($id)
    {
       $category = category::find($id);
       $category->cat_status = 1;
       $category->save();
        alert()->success('Category published?')->showConfirmButton('Yes', '#3085d6');
       return redirect('admin/manage/category');
    }

    public function editCategory($id)
    {
        $category = category::find($id);
        return view('admin.edit-category',['category'=>$category]);
    }
    public function updateCategory(Request $request)
    {
        $category = category::find($request->category_id);
        $category -> cat_name = $request->category_name;
        $category -> cat_description = $request->category_description;
        $category -> cat_status = $request->publication_status;
        $category->save();
        //alert('Well done!','Category updated successfully!', 'success');


        return redirect('admin/manage/category')->withToastSuccess('Category updated Successfully!');
    }

    public function deleteCategory($id)
    {
        $category = category::find($id);
        $category->delete();
        alert()->warning('Deleted!','Category deleted successfully!');

        return redirect('admin/manage/category');
    }


}
