<?php

namespace App\Http\Controllers;

use App\customer;
use App\order;
use App\orderDetails;
use App\payment;
use App\Shipping;
use Illuminate\Http\Request;
use Mail;
use Session;
use Cart;

class CheckoutUserController extends Controller
{
    public function index()
    {
        return view('userAuth.login');
    }

    public function CheckoutUserRegistration()
    {
        return view('userAuth.register');
    }

    public function UserSignup(Request $request)
    {
        $validatedData = $request->validate([
            'email' => 'required|unique:customers|max:255',
        ]);

       $customer = new customer();
       $customer->username = $request->	username;
       $customer->email    = $request->	email;
       $customer->phone    = $request->	phone;
       $customer->address    = $request->address;
       $customer->password = bcrypt($request->	password);
       $customer->save();

       $customerId = $customer->id;
       Session::put('customerId',$customerId);
       Session::put('Username',$customer->username);

       $data = $customer->toArray();
       Mail::send('mail.confirmation-mail',$data, function ($message) use ($data){
           $message->to($data['email']);
           $message->subject('Confirmation mail');
       });
       if (Session::get('ShippingId'))
                return redirect('shipping/adress');
       else
           return redirect('/');
    }

    public function ShippingDetails()
    {
       $customerId = customer::find(Session::get('customerId'));
        return view('shipping.shipping-address',['customer'=>$customerId]);
    }

    public function SaveShipping(Request $request)
    {
        $newShipping = new Shipping();
        $newShipping->username = $request->username;
        $newShipping->email = $request->email;
        $newShipping->phone = $request->phone;
        $newShipping->address = $request->address;
        $newShipping->save();
        Session::put('ShippingId',$newShipping->id);
        return redirect('checkout/payment');
    }

    public function PaymentForm()
    {
        return view('payment.form');
    }

    public function NewOrder(Request $request)
    {
       $payemt_type = $request->payment_type;
       if ($payemt_type == 'cash'){
           $order = new order();
           $order->customer_id = Session::get('customerId');
           $order->shipping_id = Session::get('ShippingId');
           $order->order_total = Session::get('orderTotal');
           $order->save();

           $payment = new payment();
           $payment->order_id = $order->id;
           $payment->payment_type = $payemt_type;
           $payment->save();

           // view the cart items
           $CartItems = Cart::getContent();
           foreach($CartItems as $CartItem) {
               $orderDetail = new orderDetails();
               $orderDetail->order_id         = $order->id;
               $orderDetail->product_id       = $CartItem->id;
               $orderDetail->product_name     = $CartItem->name;
               $orderDetail->product_price    = $CartItem->price;
               $orderDetail->product_quantity = $CartItem->quantity;
               $orderDetail->save();
           }
           return redirect('complete/order');
       }

       elseif ($payemt_type == 'paypal'){
            return $payemt_type;
    }

       elseif ($payemt_type == 'bkash')
       {
           return $payemt_type;
       }
       elseif ($payemt_type == 'roket')
       {
           return $payemt_type;
       }
       else
           return "invalid";

    }

    public function CompleteOreder()
    {
//        $orderId = orderDetails::where('order_id',1);
//            return $orderId;

        return view('payment.complete-payment');
    }
    public function CustomerLogin(Request $request)
    {
        $validatedData = $request->validate([
            'email' => ['required'],
        ]);
        $customer = customer::where('email',$request->email)->first();
        if (password_verify($request->password, $customer->password)) {
            Session::put('customerId',$customer->id);
            Session::put('Username',$customer->username);
            return redirect('/');
        } else {
            return redirect()->back();
        }


    }

    public function CustomerLogout()
    {
        // Forget a single key...
        Session::flush('customerId');
        Session::flush('Username');

        // Forget multiple keys...
//        $request->session()->forget(['key1', 'key2']);
//
//        $request->session()->flush();
        return redirect('/');
    }
}
