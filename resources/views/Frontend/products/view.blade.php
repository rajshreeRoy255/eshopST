@extends('layouts.front')
@section('title')
{{$product->name}}
@endsection


@section('content')
<div class="py-3 mb-4 shadow-sm bg-warning border-top">
    <div class="container">
        <h6 class="mb-0">Collections/ {{$product->category->name}} / {{$product->name}}</h6>
    </div>
</div>

<div class="conatiner">
    <div class="card shadow product_data">
        <div class="card-body">
            <div class="row">
                <div class="col-md-4 border-right">
                    <img src="{{asset('assetsAi/uploads/products/'.$product->image)}}" alt="" width="290" 
                    class="ms-9">
                </div>
                <div class="col-md-8">
                    <h2 class="mb-0">
                        {{$product->name}} 
                        @if ($product->trending == '1')
                        <label for="" class="float-end badge bg-danger trending_tag" style="font-size:16px;">Trending</label>  
                        @endif
                        
                    </h2>
                    <label for="" class="me-3">Original Price: <s>{{$product->original_price}}</s></label>
                    <label for="" class="me-3">Selling Price: {{$product->selling_price}}</label>
                    <p class="mt-3">{{$product->small_description}}</p>
                    <hr>
                    @if ($product->qty>0)
                        <label for="" class="badge bg-success">In stock</label>  
                        @else
                        <label for="" class="badge bg-danger">Out of  stock</label>
                    @endif
                    <div class="row mt-2">
                        @if ($product->qty>0)
                        <div class="col-md-2">
                            <input type="hidden" value="{{$product->id}}" class="prod_id">
                            <label for="Quantity">Quantity</label>
                            <div class="input-group text-center mb-3">
                                <input type="number" min="1" max="6" value="1" class="qty_input">
                            </div>
                        </div>
                        <div class="col-md-10">
                            <br>
                            <button class="btn btn-primary me-3 float-start addToCartBtn">Add To cart</button>
                        </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('script')
<script>
        $(document).ready(function(){
        $('.addToCartBtn').click(function (e) { 
            e.preventDefault();
            
            var product_id=$(this).closest('.product_data').find('.prod_id').val();
            var product_qty=$(this).closest('.product_data').find('.qty_input').val();

            $.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});
  $.ajax({
    type: "POST",
    url: "/add-to-cart",
    data: {
        'product_id':product_id,
        'product_qty':product_qty,
    },
    
    success: function (response) {
        swal(response.status);
        window.location.reload();
    }
  });
            
        });
    })
</script>
@endsection