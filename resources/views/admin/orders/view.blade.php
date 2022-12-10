@extends('layouts.front')
@section('title')
 User Order
@endsection

@section('content')
<div class="container py-5">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4>Order View</h4>
                </div>
                <div class="card-body">
                    <div class="row">
                        <h4 class="">Shipping Details</h4>
                        <div class="col-md-6">
                            <div class="row">
                                <div class="col-md-6"><label for="">First Name</label>
                                    <div class="border p-2">{{$order->fname}}</div></div>
                            <div class="col-md-6"><label for="">Last Name</label>
                                <div class="border p-2">{{$order->lname}}</div></div>
                                <div class="col-md-6"><label for="">Email</label>
                                    <div class="border p-2">{{$order->email}}</div></div>
                                    <div class="col-md-6"><label for="">Contact No</label>
                                        <div class="border p-2">{{$order->phone}}</div></div>
                                        <div class="col-md-6"><label for="">Contact No</label>
                                            <div class="border p-2">{{$order->phone}}</div></div>
                                            <div class="col-md-6"><label for="">Zip Code</label>
                                                <div class="border p-2">{{$order->pincode}}</div></div>
                                            <div class="col-md-12"><label for="">Shipping Address</label>
                                                <div class="border p-2">{{$order->address1}},{{$order->address2}},{{$order->city}},{{$order->state}},{{$order->country}}</div></div>
                                                
                            
                            
                            
                            
                            
                            
                        </div>
                        </div>
                        <div class="col-md-6">  
                            <h4 >Orders Details</h4>          
                            <table class="table table-inverse table-responsive">
                            <thead class="thead-inverse table-dark text-light text-center">
                                <tr>
                                    <th>Name</th>
                                    <th>Quantity</th>
                                    <th>Price</th>
                                    <th>Image</th>
                                </tr>
                            </thead>
                            <tbody class="text-center">
                                @foreach ($order->orderitems as $item)
                                <tr>
                                    <td>{{$item->products->name}}</td>
                                    <td>{{$item->qty}}</td>
                                    <td>{{$item->price}}</td>
                                    <td><img src="{{asset('assetsAi/uploads/products/'.$item->products->image)}}" alt="" width="40"></td>
                                </tr>
                                @endforeach
                                <tr>
                                    <td colspan="2"><h5>Grand Total:</h5></td>
                                    <td ><h5>{{$order->total_price}}</h5></td>
                                </tr>
                                
                            </tbody>
                        </table>
                        <label for="">Order Status</label>
                        <form action="{{url('update-order/'.$order->id)}}" method="POST">
                            @method('PUT')
                            @csrf
                        <select class="form-select" name="order_status">
                            <option {{$order->status == '0' ?'selected' : ''}}  value="0" >Pending</option>
                            <option {{$order->status == '1' ?'selected' : ''}}  value="1">Completed</option>


                            {{-- <option value="{{$order->status == '0'? 'selected': ''}}">Pending</option>
                            <option value="{{$order->status == '1'? 'selected': ''}}">Completed</option> --}}
                          </select>
                          <button class="btn btn-primary mt-4" type="submit">Update</button>
                        </form>
                    </div>
                    </div>
                </div>
            

        </div>
        </div>
    </div>
</div>
@endsection

