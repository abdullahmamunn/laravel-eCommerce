<?php

namespace App\Http\Controllers;

use App\customer;
use App\Shipping;
use Illuminate\Http\Request;
use Mail;
use Session;

class CheckoutUserController extends Controller
{
    public function index()
    {
        return view('userAuth.login');
    }

    public function UserSignup(Request $request)
    {
       $customer = new customer();
       $customer->username = $request->	username;
       $customer->email    = $request->	email;
       $customer->phone    = $request->	phone;
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
       return redirect('shipping/adress');
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
        $newShipping->save();
        Session::put('ShippingId',$newShipping->id);
        return redirect('checkout/payment');
    }

    public function PaymrntForm()
    {
        return view('payment.form');
    }

    public function NewOrder(Request $request)
    {
        return $request->all();
    }
}
