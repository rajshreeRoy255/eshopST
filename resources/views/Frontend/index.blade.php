@extends('layouts.front')
@section('title')
    Welcome to E-shopsy
@endsection

@section('slider')
@include('layouts.inc.slider')
@endsection

@section('content')
<div class="container">
    <h4 class="text-center my-4">Trending Products</h4>
    <div class="owl-carousel owl-theme">
       
        @foreach ($feature_product as $item)
        <div class="item">
            <a href="{{url('view-prod/'.$item->slug)}}" style="text-decoration: none">
            <div class="container mx-2 border shadow p-3 mb-5 bg-body rounded">
           
            <img src="{{asset('assetsAi/uploads/products/'.$item->image)}}" alt="">
            <div class="text-center">{{$item->name}}</div>
        </div></a>
    </div>
        @endforeach
    
    </div>
</div>

<div class="container">
    <h4 class="text-center">Trending Category</h4>
    <div class="owl-carousel owl-theme">
       
        @foreach ($trending_categories as $tcate)
        <div class="item">
            <a href="{{url('view-category/'.$tcate->slug)}}" style="text-decoration: none">
            <div class="container mx-2 border shadow p-3 mb-5 bg-body rounded">
           
            <img src="{{asset('assetsAi/uploads/category/'.$tcate->image)}}" alt="">
            <div class="text-center">{{$tcate->name}}</div>
        </div>
    </a>
    </div>
        @endforeach
    
    </div>
</div>

    
@endsection


@section('script')

    
@endsection