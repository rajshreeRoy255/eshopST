@extends('layouts.front')
@section('title')
{{$category->name}}
@endsection


@section('content')
<div class="py-3 mb-4 shadow-sm bg-warning border-top">
    <div class="container">
        <h6 class="mb-0">Collections/ {{$category->name}}
    </div>
</div>
<div class="container">

    <h4 class="text-center my-4">{{$category->name}}</h4>
 
    <div class="container">
        <div class="row">
            @foreach ($product as $item)
            <div class="col-md-4">
                <div class="card" style="width: 18rem;">
                    <a href="{{url('category/'.$category->slug.'/'.$item->slug)}}">
                    
                    <div class="card-body mx-0 p-0">
                        <img src="{{asset('assetsAi/uploads/products/'.$item->image)}}" class="card-img-top" alt="...">
                      <p class="card-text">{{$item->name}}</p>
                    </div>
                    </a>
                  </div>
            </div>
            @endforeach
        </div>
    </div>
</div>

       
        
      
            
           
            
       
        
    
    
</div>
@endsection