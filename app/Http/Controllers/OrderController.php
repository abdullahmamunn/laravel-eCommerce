<?php

namespace App\Http\Controllers;

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
       return view('admin.orders.order-details');
    }
}
