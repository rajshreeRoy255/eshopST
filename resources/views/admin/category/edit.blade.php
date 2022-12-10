@extends('layouts.admin')
@section('content')
  <div class="card">
    <div class="card-header">
        <h2 class="card-title">Edit Category</h2>
    </div>
    <div class="card-body">
        <form action="{{url('update-category/'.$category->id)}}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
<div class="row">
    <div class="col-md-6 mb-2">
        <label for="">Name</label>
        <input type="text" class="form-control" name="name" value="{{$category->name}}">
    </div>
    <div class="col-md-6 mb-2">
        <label for="">slug</label>
        <input type="text" class="form-control" name="slug" value="{{$category->slug}}">
    </div>
    <div class="col-md-12 mb-2">
        <label for="">Description</label>
       <textarea name="description"  rows="3" class="form-control">{{$category->description}}</textarea>
    </div>
    <div class="col-md-6 mb-2">
        <label for="">Status</label>
        <input type="checkbox" name="status" {{$category->status=='1'?'checked':''}}>
    </div>
    <div class="col-md-6 mb-2">
        <label for="">Popular</label>
        <input type="checkbox"  name="popular" {{$category->popular=='1'?'checked':''}}>
    </div>
    <div class="col-md-6 mb-2">
        <label for="">Meta Title</label>
        <input type="text" class="form-control" name="meta_title" value="{{$category->meta_title}}">
    </div>
    <div class="col-md-6 mb-2">
        <label for="">Meta Keywoards</label>
        <input type="text" class="form-control" name="meta_keyboards" value="{{$category->meta_keywords}}">
    </div>
    <div class="col-md-6 mb-3">
        <label for="">Meta Description</label>
        <input type="text" class="form-control" name="meta_description" value="{{$category->meta_desc}}">
    </div>
    <div class="col-md-6 mb-2">
        <label for="">Current Image:</label>
        @if ($category->image)
        <img src="{{asset('assetsAi/uploads/category/'.$category->image)}}" alt="" width="90px">
            
        @endif
    </div><br>
    
    <div class="col-md-6 mb-2">
        <input type="file" class="form-control" name="image">
    </div>



</div>
<div class="mb-3 text-center m-auto">
    <button type="submit" class="btn active bg-gradient-primary text-white w-100 " >Update</button>
 </div>
        </form>
  </div>
</div>
    
@endsection