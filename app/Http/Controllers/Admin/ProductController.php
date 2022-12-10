<?php

namespace App\Http\Controllers\Admin;

use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;

class ProductController extends Controller
{
public function index()
{
    $product=Product::all();
    return view('admin.products.index',compact('product'));
}
public function add()
{
    $category=Category::all();
    return view('admin.products.add',compact('category'));
}
public function insert(Request $request)
{
    $product= new Product();
    if($request->hasFile('image')){
        $file = $request->file('image');
        $ext=$file->getClientOriginalExtension();
        $filename=time().'.'.$ext;
        $file->move('assetsAi/uploads/products',$filename);
        $product->image=$filename;
    }
    $product->name=$request->input('name');
    $product->slug=$request->input('slug');
    $product->cate_id=$request->input('cate_id');
    $product->slug=$request->input('slug');
    $product->small_description=$request->input('small_description');
    $product->description=$request->input('description');
    $product->original_price=$request->input('original_price');
    $product->selling_price=$request->input('selling_price');
    $product->qty=$request->input('qty');
    $product->tax=$request->input('tax');
    $product->status=$request->input('status')== TRUE ?'1':'0';
    $product->trending=$request->input('trending')== TRUE ?'1':'0';;
    $product->meta_title=$request->input('meta_title');
    $product->meta_keywords=$request->input('meta_keywords');
    $product->meta_description=$request->input('meta_description');

    $product->save();
    return redirect('/products')->with('status',"Product Added Successfully");

}

public function edit($id)
{
    $product = Product::find($id);
    return view('admin.products.edit',compact('product'));
}

public function update($id, Request $request)
{
    $product=Product::find($id);
    if($request->hasFile('image'))
   {
    $path = 'assetsAi/uploads/products/'.$product->image;
    if(File::exists($path))
    {
        File::delete($path);
    }
    $file = $request->file('image');
    $ext=$file->getClientOriginalExtension();
    $filename=time().'.'.$ext;
    $file->move('assetsAi/uploads/products',$filename);
    $product->image=$filename;
   }

   $product->name=$request->input('name');
   $product->slug=$request->input('slug');
   $product->small_description=$request->input('small_description');
   $product->description=$request->input('description');
   $product->original_price=$request->input('original_price');
   $product->selling_price=$request->input('selling_price');
   $product->qty=$request->input('qty');
   $product->tax=$request->input('tax');
   $product->status=$request->input('status')== TRUE ?'1':'0';
   $product->trending=$request->input('trending')== TRUE ?'1':'0';;
   $product->meta_title=$request->input('meta_title');
   $product->meta_keywords=$request->input('meta_keywords');
   $product->meta_description=$request->input('meta_description');

   $product->update();
   return redirect('/products')->with('status',"Product Updated Successfully");
}

public function destroy($id)
{
   $product=Product::find($id);
   if($product->image){
    $path = 'assetsAi/uploads/products/'.$product->image;
    if(File::exists($path))
    {
        File::delete($path);
    }
   }
   $product->delete();
   return redirect('/products')->with('status',"Product has been deleted successfully");
}



}
