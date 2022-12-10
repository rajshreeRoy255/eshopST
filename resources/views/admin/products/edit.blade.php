@extends('layouts.admin')
@section('content')
  <div class="card">
    <div class="card-header">
        <h2 class="card-title">Edit Product</h2>
    </div>
    <div class="card-body">
        <form action="{{url('update-product/'.$product->id)}}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
<div class="row">

    <div class="col-md-6 mb-3">
        <label for="">Name</label>
        <input type="text" class="form-control" name="name" value="{{$product->name}}">
    </div>
    <div class="col-md-6 mb-4">
        <label for="">Slug</label>
        <input type="text" class="form-control" name="slug" value="{{$product->slug}}">
    </div>
    <div class="col-md-6 mb-3">
        <label for="">Small Description</label>
       <textarea name="small_description"  rows="3" class="form-control">{{$product->small_description}}</textarea>
    </div>
    <div class="col-md-6 mb-3">
        <label for="">Description</label>
       <textarea name="description"  rows="3" class="form-control">{{$product->description}}</textarea>
    </div>
    <div class="col-md-4 mb-3">
        <label for="">Original Price</label>
        <input type="number" name="original_price"  class="form-control" value="{{$product->original_price}}">
    </div>
    <div class="col-md-4 mb-3">
        <label for="">Selling Price</label>
        <input type="number"  name="selling_price"  class="form-control" value="{{$product->selling_price}}">
    </div>
    <div class="col-md-4 mb-3">
        <label for="">Current Image:</label>
        @if ($product->image)
        <img src="{{asset('assetsAi/uploads/products/'.$product->image)}}" alt="" width="100px">
        @endif 
    </div>
    <div class="col-md-6 mb-3">
        <label for="">Change Image</label>
        <input type="file"  name="image"  class="form-control" value="{{$product->slug}}">
    </div>
    <div class="col-md-6 mb-3">
        <label for="">Quantity</label>
        <input type="number"  name="qty"  class="form-control" value="{{$product->qty}}">
    </div>

    <div class="col-md-6 mb-3">
        <label for="">Status</label>
        <input type="checkbox"  name="status"  class="form-check-input" {{$product->status=='1'?'checked':''}}>
    </div>
    <div class="col-md-6 mb-3">
        <label for="">Trending</label>
        <input type="checkbox"  name="trending"  class="form-check-input"  {{$product->trending=='1'?'checked':''}}>
    </div>
    <div class="col-md-6 mb-3">
        <label for="">Tax</label>
        <input type="number"  name="tax"  class="form-control"  value="{{$product->tax}}">
    </div>
    <div class="col-md-6 mb-3">
        <label for="">Meta Title</label>
        <input type="text"  name="meta_title"  class="form-control"  value="{{$product->meta_title}}">
    </div>
    <div class="col-md-6 mb-3">
        <label for="">Meta Keywords</label>
        <input type="text"  name="meta_keywords"  class="form-control"  value="{{$product->meta_keywords}}">
    </div>
    <div class="col-md-6 mb-3">
        <label for="">Meta Description</label>
        <input type="text" class="form-control" name="meta_description"  value="{{$product->meta_description}}">
</div>
<div class="col-md-12 mb-3 w-100 mt-4 m-auto">
    <button type="submit" class="btn active bg-gradient-primary text-white w-15">Update</button>
 </div>
        </form>
  </div>
</div>
    
@endsection