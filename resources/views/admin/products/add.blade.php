@extends('layouts.admin')
@section('content')
  <div class="card">
    <div class="card-header">
        <h2 class="card-title">Add Product</h2>
    </div>
    <div class="card-body">
        <form action="{{url('insert-product')}}" method="POST" enctype="multipart/form-data">
            @csrf
<div class="row">

    <div class="col-md-6 mb-3">
        <label for="">Name</label>
        <input type="text" class="form-control" name="name">
    </div>
    <div class="col-md-6 mb-4">
        <label for="">Slug</label>
        <input type="text" class="form-control" name="slug">
    </div>
    <div class="col-md-12 mb-4">
        <select class="form-select" aria-label="Default select example" name="cate_id">
            <option value="">Select a category</option>
            @foreach ($category as $item)
            <option value="{{$item->id}}">{{$item->name}}</option>  
            @endforeach
          </select>
    </div>
    <div class="col-md-6 mb-3">
        <label for="">Small Description</label>
       <textarea name="small_description"  rows="3" class="form-control"></textarea>
    </div>
    <div class="col-md-6 mb-3">
        <label for="">Description</label>
       <textarea name="description"  rows="3" class="form-control"></textarea>
    </div>
    <div class="col-md-6 mb-3">
        <label for="">Original Price</label>
        <input type="number" name="original_price"  class="form-control">
    </div>
    <div class="col-md-6 mb-3">
        <label for="">Selling Price</label>
        <input type="number"  name="selling_price"  class="form-control">
    </div>
    <div class="col-md-6 mb-3">
        <label for="">Image</label>
        <input type="file"  name="image"  class="form-control">
    </div>
    <div class="col-md-6 mb-3">
        <label for="">Quantity</label>
        <input type="number"  name="qty"  class="form-control">
    </div>

    <div class="col-md-6 mb-3">
        <label for="">Status</label>
        <input type="checkbox"  name="status"  class="form-check-input">
    </div>
    <div class="col-md-6 mb-3">
        <label for="">Trending</label>
        <input type="checkbox"  name="trending"  class="form-check-input">
    </div>
    <div class="col-md-6 mb-3">
        <label for="">Tax</label>
        <input type="number"  name="tax"  class="form-control">
    </div>
    <div class="col-md-6 mb-3">
        <label for="">Meta Title</label>
        <input type="text"  name="meta_title"  class="form-control">
    </div>
    <div class="col-md-6 mb-3">
        <label for="">Meta Keywords</label>
        <input type="text"  name="meta_keywords"  class="form-control">
    </div>
    <div class="col-md-6 mb-3">
        <label for="">Meta Description</label>
        <input type="text" class="form-control" name="meta_description">
</div>
<div class="col-md-12 mb-3 w-100 mt-4 m-auto">
    <button type="submit" class="btn active bg-gradient-primary text-white w-15">Submit</button>
 </div>
        </form>
  </div>
</div>
    
@endsection