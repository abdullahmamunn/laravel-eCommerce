<?php

namespace App\Http\Controllers;

use App\customer;
use App\order;
use App\orderDetails;
use App\payment;
use App\Shipping;
Use Alert;
use PDF;
use Illuminate\Http\Request;
use DB;

class OrderController extends Controller
{
    public function index()
    {
        $orders = DB::table('orders')
            ->join('customers', 'orders.customer_id', '=', 'customers.id')
            ->join('payments', 'orders.id', '=', 'payments.order_id')
            ->select('orders.*', 'customers.username', 'payments.payment_type','payments.payment_status')
            ->get();

        return view('admin.orders.manage-order',['order'=>$orders]);
    }

    public function OrderDetails($id)
    {
       $order        = order::find($id);
       $customer     = customer::find($order->customer_id);
       $shipping     = Shipping::find($order->shipping_id);
       $payment      = payment::where('order_id',$order->id)->first();
       $orderDetails = orderDetails::where('order_id',$order->id)->get();

       return view('admin.orders.order-details',[
           'order'=>$order,
           'customer'=>$customer,
           'shipping'=>$shipping,
           'payment'=>$payment,
           'orderDetails'=>$orderDetails
       ]);
    }

    public function OrderInvoice($id)
    {
        $order        = order::find($id);
        $customer     = customer::find($order->customer_id);
        $shipping     = Shipping::find($order->shipping_id);
        $payment      = payment::where('order_id',$order->id)->first();
        $orderDetails = orderDetails::where('order_id',$order->id)->get();

        return view('admin.orders.invoice',[
            'order'=>$order,
            'customer'=>$customer,
            'shipping'=>$shipping,
            'payment'=>$payment,
            'orderDetails'=>$orderDetails
        ]);
    }
    public function DeleteOrder($id)
    {
        $delete = order::find($id);
        $delete->delete();
//        Alert::success('Success Title', 'Success Message');
        return redirect('admin/manage/orders');
    }

    public function DownloadInvoice($id)
    {
        $order        = order::find($id);
        $customer     = customer::find($order->customer_id);
        $shipping     = Shipping::find($order->shipping_id);
        $payment      = payment::where('order_id',$order->id)->first();
        $orderDetails = orderDetails::where('order_id',$order->id)->get();
//        $pdf = PDF::loadView('admin.orders.test',[
//            'order'=>$order,
//            'customer'=>$customer,
//            'shipping'=>$shipping,
//            'payment'=>$payment,
//            'orderDetails'=>$orderDetails
//        ]);
//        return $pdf->stream('invoice.pdf');
        return view('admin.orders.test',[
            'order'=>$order,
            'customer'=>$customer,
            'shipping'=>$shipping,
            'payment'=>$payment,
            'orderDetails'=>$orderDetails
        ]);


    }
}
