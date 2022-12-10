<?php

namespace App\Http\Controllers\Admin;

use App\Models\Product;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Category;

class FrontendController extends Controller
{
    public function index(){
        $feature_product=Product::where('trending','1')->take(10)->get();
        $trending_categories=Category::where('popular','1')->take(10)->get();
        return view('Frontend.index',compact('feature_product','trending_categories'));
    }

    public function category()
    { $category=Category::where('status','0')->get();
       return view('Frontend.category',compact('category'));
    }
    public function viewCategory($slug)
    {
        if(category::where('slug',$slug)->exists()){
            $category=category::where('slug',$slug)->first();
            $product=Product::where('cate_id',$category->id)->where('status','0')->get();
            return view('Frontend.products.index',compact('product','category'));
        
        }else{
            return redirect('/')->with('status',"Slug does not exist");
        }
    //    $product=Product::where
    }

    public function productview($cate_slug,$prod_slug)
    {
        if(category::where('slug',$cate_slug)->exists()){
            if(Product::where('slug',$prod_slug)->exists()){

                $product=Product::where('slug',$prod_slug)->first();
                return view('Frontend.products.view',compact('product'));
            }else{
                return redirect('/')->with('status',"The link was broken");
            }
        } else{
            return redirect('/')->with('status',"No such category found");
        }  
        
    }

    public function users()
    {
       
    }


    public function trending_product_view($id)
    {
        if(Product::where('slug',$id)->exists()){

            $product=Product::where('slug',$id)->first();
            return view('Frontend.products.view',compact('product'));
        }else{
            return redirect('/')->with('status',"The link was broken");
        }
    }
}
