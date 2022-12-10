@extends('layouts.front')
@section('title')
    Category
@endsection

@section('content')
<div class="py-5">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h3 class="text-center">All Categories</h3>
                <div class="row">
                @foreach ($category as $cate)
                    <div class="col-md-3 mb-3">
                        <a href="{{url('view-category/'.$cate->slug)}}" style="text-decoration: none">
                        <div class="card ">
                            <img src="{{asset('assetsAi/uploads/category/'.$cate->image)}}" alt="" width="200" class="text-center m-auto">
                            <div class="card-body">
                                <p class="text-center">{{$cate->name}}</p>
                                <p class="text-center">{{$cate->description}}</p>
                            

                            </div>
                        </div></a>

                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>

    
@endsection