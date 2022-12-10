@extends('layouts.admin')
@section('content')
  <div class="card">
    <div class="card-header">
      <h2 class="card-title">Registered User</h2>
    </div>
<div class="card-body">
  <table class="table">
    <thead class="text-center">
      <tr>
        <th>ID</th>
        <th>Name</th>
        <th>Email</th>
        <th>Phone</th>
    
      </tr>
    </thead>
    <tbody class="text-center">
      @foreach ($user as $item)
         <tr>
        <td>{{$item->id}}</td>
        <td>{{$item->name.' '.$item->lname}}</td>
        <td>{{$item->email}}</td>
        <td>{{$item->phone}}</td>
       
      
      </tr>
      @endforeach

    </tbody>
  </table>
</div>
   
    
  </div>
    
@endsection