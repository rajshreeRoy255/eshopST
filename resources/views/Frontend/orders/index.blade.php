@extends('layouts.front')
@section('title')
  My Order
@endsection

@section('content')
<div class="container py-5">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4>My Orders</h4>
                </div>
            
            <table class="table table-striped table-inverse table-responsive">
                <thead class="thead-inverse table-dark text-light text-center">
                    <tr>
                        <th>Tracking Number</th>
                        <th>Total Price</th>
                        <th>Status</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody class="text-center">
                    @foreach ($orders as $item)
                    <tr>
                        <td>{{$item->tracking_no}}</td>
                        <td>{{$item->total_price}}</td>
                        <td>{{$item->status=='0'?'Pending':'Completed'}}</td>
                        <td><a class="btn btn-primary" href="{{url('view_orders/'.$item->id)}}">View</a></td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        </div>
    </div>
</div>
@endsection

