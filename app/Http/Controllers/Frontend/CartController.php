<?php

namespace App\Http\Controllers\Frontend;

use App\Models\Cart;
use App\Models\Product;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Console\View\Components\Alert;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{
    public function addProduct(Request $request)
    {
        $product_id=$request->input('product_id');
        $product_qty=$request->input('product_qty');
        
        if(Auth::check()){
            $prod_check = Product::where('id',$product_id)->first();
            if($prod_check){
                if(Cart::where('product_id',$product_id)->where('user_id',Auth::id())->exists()){
                    return response()->json(['status'=>$prod_check->name." Already Added to cart"]); 
                }
                $cartItem= new Cart();
                $cartItem->product_id=$product_id;
                $cartItem->user_id=Auth::id();
                $cartItem->product_qty=$product_qty;
                $cartItem->save();
                return response()->json(['status'=>$prod_check->name."Added to cart"]);
            }
            
        }else{
            return response()->json(['status'=>"Login To Continue"]);
        }
    }

    public function viewCart()
    {
        $cartItems= Cart::where('user_id',Auth::id())->get();
       return view('Frontend.cart',compact('cartItems'));
    }


public function deleteproduct(Request $request)
{
    if(Auth::check()){
    $product_id=$request->input('product_id');
    if(Cart::where('product_id',$product_id)->where('user_id',Auth::id())->exists()){
        $cartItem= Cart::where('product_id',$product_id)->where('user_id',Auth::id())->first();
        $cartItem->delete();
        return response()->json(['status'=>"Product Deleted successfully"]);
    }
    }else{
        return response()->json(['status'=>"Login To Continue"]);
    }

}

public function updateCart(Request $request)
{
    $prod_id=$request->input('product_id');
    $prod_qty=$request->input('product_qty');

    // return response()->json(['status'=>"hell"]); 
    if(Auth::check()){
        if(Cart::where('product_id',$prod_id)->where('user_id',Auth::id())->exists()){
            $cart= Cart::where('product_id',$prod_id)->where('user_id',Auth::id())->first(); 
            $cart->product_qty=$prod_qty;
            $cart->update();
            return response()->json(['status'=>"Quantity Updated"]);
        } 
    }
    
}
public function cart_count()
{
   $cartcount=Cart::where('user_id',Auth::id())->count();
   return response()->json(['count'=>$cartcount]);
}



}
