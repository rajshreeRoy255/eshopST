@extends('layouts.front')
@section('title')
    Checkout
@endsection

@section('content')
<div class="container mt-5">
    <form action="{{url('place_order')}}" method="POST">
        @csrf
    <div class="row">
        <div class="col-md-7">
            <div class="card">
                <div class="card-body">
                    Basic Details
                    <hr>
                    <div class="row checkout_form">
                        <div class="col-md-6 mb-3">
                            <label for="FirstName">First Name</label>
                            <input type="text" class="form-control" placeholder="Enter First Name"  name="fname" value="{{Auth::user()->name}}">
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="FirstName">Last Name</label>
                            <input type="text" class="form-control" placeholder="Enter First Name" name="lname" value="{{Auth::user()->lname}}">
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="FirstName">Email</label>
                            <input type="text" class="form-control" placeholder="Enter First Name" name="email" value="{{Auth::user()->email}}">
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="FirstName">Phone Number</label>
                            <input type="text" class="form-control" placeholder="Enter First Name" name="phone" value="{{Auth::user()->phone}}">
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="FirstName">Address 1</label>
                            <input type="text" class="form-control" placeholder="Enter First Name" name="address1" value="{{Auth::user()->address1}}">
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="FirstName">Address 2</label>
                            <input type="text" class="form-control" placeholder="Enter First Name" name="address2" value="{{Auth::user()->address2}}">
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="FirstName">City</label>
                            <input type="text" class="form-control" placeholder="Enter First Name" name="city" value="{{Auth::user()->city}}">
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="FirstName">State</label>
                            <input type="text" class="form-control" placeholder="Enter First Name" name="state" value="{{Auth::user()->state}}">
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="FirstName">Country</label>
                            <input type="text" class="form-control" placeholder="Enter First Name" name="country" value="{{Auth::user()->country}}">
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="FirstName">Pincode</label>
                            <input type="text" class="form-control" placeholder="Enter First Name" name="pincode" value="{{Auth::user()->pincode}}">
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-5">
            <div class="card">
                <div class="card-body">
                    <h6>Order-Details</h6>
                    <hr>
                    
                    @if ($cartItem->count()> 0)
                    <table class="table table-striped table-inverse table-responsive">
                        <thead class="thead-inverse text-center">
                            <tr>
                                <th>Product Name</th>
                                <th>Quantity</th>
                                <th>Price</th>
                            </tr>
                            </thead>
                            <tbody class="text-center">
                                @foreach ($cartItem as $item)
                                <tr>
                                    <td scope="row">{{$item->products->name}}</td>
                                    <td>{{$item->product_qty}}</td>
                                    <td><i class="fa fa-inr">&nbsp;</i><b>{{number_format($item->products->selling_price,2)}}/-</td>
                                </tr>
                                @endforeach
                            </tbody>
                    </table>
                        <hr>
                        <div class="container">
                            <div class="row">
                                <div class="col-md-12 ">
                                    <button type="submit" class="btn btn-primary bg-outline-primary text-center m-auto w-100 custumBtn">Place Order</button>
                                </div>
                            </div>   
                    


                    @else
                       <h2>No Products in cart</h2> 
                    @endif
                        </form>
                        </div>
                        
                    
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

