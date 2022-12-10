<?php

namespace App\Http\Controllers\Frontend;

use App\Models\Cart;
use App\Models\User;
use App\Models\Order;
use App\Models\Product;
use App\Models\OrderItem;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class CheckoutController extends Controller
{
    public function index()
    {
        $cartItem = Cart::where('user_id',Auth::id())->get();
        return view('Frontend.checkout',compact('cartItem'));
    }
    public function place_order( Request $request)
    {
       $order= new Order();
       $order->user_id=Auth::id();
       $order->fname=$request->input('fname');
       $order->lname=$request->input('lname');
       $order->email=$request->input('email');
       $order->phone=$request->input('phone');
       $order->address1=$request->input('address1');
       $order->address2=$request->input('address2');
       $order->city=$request->input('city');
       $order->state=$request->input('state');
       $order->country=$request->input('country');
       $order->pincode=$request->input('pincode');
      
       

    //    to calculating total price
    $total =0;
$carti_total = Cart::where('user_id',Auth::id())->get();
foreach($carti_total as $prod)
{
    $total+=$prod->products->selling_price*$prod->product_qty;
}
$order->total_price=$total;

$order->tracking_no='RJ'.rand(1111,9999);
$order->save();

       $order->id;  
       $cartItem = Cart::where('user_id',Auth::id())->get();
       foreach($cartItem as $item){
        OrderItem::create([
            'order_id'=> $order->id, 
            'product_id'=> $item->product_id, 
            'qty'=> $item->product_qty, 
            'price'=> $item->products->selling_price, 

        ]);
        $prod=Product::where('id',$item->product_id)->first();
        $prod->qty-=$item->product_qty;
        $prod->update();
       } 
       if(Auth::user()->address1== NULL)
       {
        $user= User::where('id', Auth::id())->first();
        $user->name=$request->input('fname');
        $user->lname=$request->input('lname');
        $user->phone=$request->input('phone');
        $user->address1=$request->input('address1');
        $user->address2=$request->input('address2');
        $user->city=$request->input('city');
        $user->state=$request->input('state');
        $user->country=$request->input('country');
        $user->pincode=$request->input('pincode');
        $user->update();
       }
       $cartItem = Cart::where('user_id',Auth::id())->get();
       Cart::destroy($cartItem);
       return redirect('/')->with('status',"Order Placed Successfully");
    }
}
