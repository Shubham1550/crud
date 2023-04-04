<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    //

    public function index(){
        $orders = Order::with('product','user')->get();
        // dd($order);
        return view('admin.order.index',compact('orders'));
    }
}
