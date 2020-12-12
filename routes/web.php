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
Route::prefix('/admin')->group(function (){
    Route::get('/',[
        'uses'=>'AuthController@AdminLoginForm',
        'as'=>'/admin'
    ]);
    Route::post('/login',[
        'uses'=>'AuthController@AdminLoginFormSubmit',
        'as'=>'admin-login'
    ]);
    Route::get('/dashboard',[
        'uses'=>'AuthController@AdminDashboard',
        'as'=>'dashboard'
    ]);

    Route::post('/logout',[
        'uses'=>'AuthController@AdminLogout',
        'as'=>'admin-logout'
    ]);

});



//user-login is here
Route::get('user/login','AuthController@Userlogin')->name('user-login');
Route::get('user/registration',[
    'uses'=>'AuthController@AuthSystemRegistration',
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

Route::post('add/cart',[
    'uses'=>'checkoutController@AddCart',
    'as'=>'add-cart'
    ]);

Route::get('checkout/products',[
    'uses'=>'checkoutController@index',
    'as'  =>'checkout-products'
]);
Route::get('delete/cart/item/{id}',[
    'uses'=>'checkoutController@DeleteCartItem',
    'as' =>'delete-cart-item'
]);
Route::post('update/cart',[
    'uses'=>'checkoutController@UpdateCartItem',
    'as' =>'update-cart'
]);

//Checkout user
Route::get('checkout/user','CheckoutUserController@index')->name('checkout-user');
Route::get('checkout/user/registration','CheckoutUserController@CheckoutUserRegistration');
Route::post('checkout/user/signup','CheckoutUserController@UserSignup')->name('user-signup');

//shipping details

Route::get('shipping/adress','CheckoutUserController@ShippingDetails')->name('checkout');
Route::post('shipping/save','CheckoutUserController@SaveShipping')->name('new-shipping');
Route::get('checkout/payment','CheckoutUserController@PaymentForm')->name('payment');
Route::post('checkout/order','CheckoutUserController@NewOrder')->name('mew-order');
Route::get('complete/order','CheckoutUserController@CompleteOrder');

//Customer login
Route::post('customer-login',[
    'uses'=>'CheckoutUserController@CustomerLogin',
    'as'=>'customer-login'
]);
Route::post('customer-logout',[
    'uses'=>'CheckoutUserController@CustomerLogout',
    'as'=>'customer-logout'
]);

//Manage Orders
Route::get('admin/manage/orders','OrderController@index')->name('manage-order');
Route::get('admin/manage/orders/details/{id}','OrderController@OrderDetails')->name('order-details');
Route::get('admin/manage/orders/delete/{id}','OrderController@DeleteOrder')->name('delete-order');
Route::get('admin/manage/orders/invoice/{id}','OrderController@OrderInvoice')->name('order-invoice');
Route::get('admin/manage/download/invoice/{id}','OrderController@DownloadInvoice')->name('download-invoice');



Auth::routes();
Route::resource('home', 'HomeController');
