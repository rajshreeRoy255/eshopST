@extends('layouts.admin')
@section('content')
  <div class="card">
    <div class="card-header">
      <h2 class="card-title">Category Page</h2>
    </div>
<div class="card-body">
  <table class="table">
    <thead>
      <tr>
        <th>ID</th>
        <th>Name</th>
        <th>Description</th>
        <th>Image</th>
        <th colspan="2" class="text-center">Actions</th>
      </tr>
    </thead>
    <tbody>
      @foreach ($category as $item)
         <tr>
        <td>{{$item->id}}</td>
        <td>{{$item->name}}</td>
        <td>{{$item->description}}</td>
        <td><img src="{{asset('assetsAi/uploads/category/'.$item->image)}}" alt="" width="40px"></td>
        <td  colspan="2">
          <a href="{{url('edit-category/'.$item->id)}}" class="btn btn-success mx-3"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> &nbsp; Edit&nbsp;&nbsp;</a>
          <a href="{{url('delete-category/'.$item->id)}}" class="btn btn-danger"><i class="fa fa-trash" aria-hidden="true"></i>&nbsp;Delete&nbsp;</a>
        </td>
      
      </tr>
      @endforeach

    </tbody>
  </table>
</div>
   
    
  </div>
    
@endsection