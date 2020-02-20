<?php



Route::get('/',[
    'uses'=>'MyShopController@index',
    'as'=>'/'
]);

Route::get('/products/categories/{id}/{category_name}',[
    'uses'=>'MyShopController@products',
    'as'=>'products'
]);
Route::get('/products/details/{id}',[
   'uses'=> 'MyShopController@productDetails',
    'as'=>'product-details'
]);

//Route::get('{main_category}/{sub_category}',[
//    'uses'=>'ProductsController@index',
//    'as' => 'products.index']);
Route::get('/admin',[
    'uses'=>'AuthController@AdminLogin',
    'as'=>'/admin'

]);


Route::get('/login',[
    'uses'=>'AuthController@AuthSyetemLogin',
    'as'=>'/login'
]);
Route::get('/registration',[
    'uses'=>'AuthController@AuthSyetemRegistration',
    'as'=>'/register'
]);


//my shop category controller
    Route::get('admin/add/category',[
        'uses'=>'CategoryController@index',
        'as'=>'add.category'
    ]);

    Route::post('admin/category/store',[
        'uses'=>'CategoryController@StoreCategory',
        'as'=>'store'
    ]);
    Route::get('admin/manage/category',[
        'uses'=>'CategoryController@manageCategory',
        'as'=>'manage.category'
    ]);
    Route::get('admin/unpublished/{id}',[
        'uses'=>'CategoryController@UnpublishedCategory',
        'as'=>'unpublished-category'
    ]);
    Route::get('admin/published/{id}',[
        'uses'=>'CategoryController@publishedCategory',
        'as'=>'published-category'
    ]);
   Route::get('admin/edit/{id}',[
        'uses'=>'CategoryController@editCategory',
        'as'=>'edit-category'
    ]);
   Route::post('admin/update/category',[
        'uses'=>'CategoryController@updateCategory',
        'as'=>'update'
    ]);
   Route::get('admin/delete/category/{id}',[
        'uses'=>'CategoryController@deleteCategory',
        'as'=>'delete-category'
    ]);

   //my shop brand Controller
Route::get('admin/add/brand','BrandController@index')->name('add-brand');
Route::post('admin/store/brand','BrandController@storeBrand')->name('store-brand');
Route::get('admin/manage/brand','BrandController@manageBrand')->name('manage-brand');
Route::get('admin/published/brand/{brand_id}','BrandController@publishedBrand')->name('published-brand');
Route::get('admin/unpublished/brand/{brand_id}','BrandController@unpublishedBrand')->name('unpublished-brand');
Route::get('admin/delete/brand/{id}','BrandController@DeleteBrand')->name('delete');
Route::get('admin/update/brand/{id}','BrandController@updateBrand')->name('edit-brand');
Route::post('admin/update/brand','BrandController@submitBrand')->name('update-brand');

//my shop product controller
Route::get('admin/add/product','ProductController@index')->name('add-product');
Route::post('admin/store/product',[
    'uses'=>'ProductController@StoreProduct',
    'as'=>'store-product'
]);
Route::get('admin/manage/products',[
    'uses'=>'ProductController@ManageProduct',
    'as'=>'manage-product'
]);
Route::get('admin/edit/products/{id}',[
    'uses'=>'ProductController@EditProducts',
    'as'=>'edit-products'
]);
Route::post('admin/update/products',[
    'uses'=>'ProductController@UpdateProducts',
    'as'=>'update-products'
]);
Route::get('admin/delete/products/{id}',[
    'uses'=>'ProductController@DeleteProducts',
    'as'=>'delete-product'
]);


// Check-out products

Route::get('checkout/products',[
    'uses'=>'checkoutController@index',
    'as' =>'checkout-products'
]);
