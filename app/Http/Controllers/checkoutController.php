<?php

namespace App\Http\Controllers;

use App\product;
use Cart;
use Illuminate\Http\Request;

class checkoutController extends Controller
{
    public function index()
    {
        $cartCollection = Cart::getContent();
        //return $cartCollection;
        return view('category.products.checkout-products',[
            'checkcart'=>$cartCollection
        ]);
    }

    public function AddCart(Request $request)
    {
        $product = product::find($request->id);
        Cart::add([
            'id' => $request->id, // inique row ID
            'name' => $product->product_name,
            'price' => $product->product_price,
            'quantity' => $request->qty,
            'attributes' => [
                'image'=>$product->image
            ]
        ]);

        return redirect('checkout/products');
    }

    public function DeleteCartItem($id)
    {
        Cart::remove($id);
        alert()->success('Successfully deleted!');
        return redirect('checkout/products');
    }

    public function UpdateCartItem(Request $request)
    {
       // return $request->all();

//        Cart::update([
//            $request->id,
//            'quantity' => $request->qty
//        ]);
        Cart::update($request->id, array(
            'quantity' => array(
                'relative' => false,
                'value' => $request->qty
            ),
        ));
        alert()->success('Successfully Updated!');
        return redirect('checkout/products');
    }
}
