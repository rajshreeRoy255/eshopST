<?php

namespace App\Http\Controllers\Admin;

use App\Models\Order;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class OrderController extends Controller
{
    public function orders()
    {
        $order=Order::where('status','0')->get();
       return view('admin.orders.index',compact('order'));
    }
    public function view($id)
    {
        $order=Order::where('id',$id)->first();
       return view('admin.orders.view',compact('order'));
    }
    public function updateorder($id, Request $request)
    {
       $orders = Order::find($id);
       $orders->status=$request->input('order_status');
       $orders->update();
       return redirect('orders')->with('status',"Order Updated Successfully");
    }
    public function orderhistory()
    {
        $order=Order::where('status','1')->get();
        return view('admin.orders.history',compact('order'));
    }
}
