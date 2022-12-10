@extends('layouts.front')
@section('title')
   Order History
@endsection

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4>Order History</h4>
                </div>
            
            <table class="table table-striped table-inverse table-responsive">
                <thead class="thead-inverse table-dark text-light text-center">
                    <tr>
                        <th>Order Date</th>
                        <th>Tracking Number</th>
                        <th>Total Price</th>
                        <th>Status</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody class="text-center">
                    @foreach ($order as $item)
                    <tr>
                        <td>{{date('d-m-Y',strtotime($item->created_at))}}</td>
                        <td>{{$item->tracking_no}}</td>
                        <td>{{$item->total_price}}</td>
                        <td>{{$item->status=='0'?'Pending':'Completed'}}</td>
                        <td><a class="btn btn-primary" href="{{url('admin/view_orders/'.$item->id)}}">View</a></td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        </div>
    </div>
</div>
@endsection

