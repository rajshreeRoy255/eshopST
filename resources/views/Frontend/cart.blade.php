@extends('layouts.front')
@section('title')
cart
@endsection


@section('content')
<div class="py-3 mb-4 shadow-sm bg-warning border-top">
    <div class="container">
        <h6 class="mb-0">Home/Cart</h6>
    </div>
</div>
<div class="container ">
  @if ($cartItems->count()> 0)

  <table class="table table-inverse table-responsive shadow-lg p-3 mb-5 bg-body rounded text-center">
    <thead>
        <tr>
            <th>Product Name</th>
            <th>Image</th>
            <th>Price</th>
            <th>Quantity</th>
            <th>Remove</th>
        </tr>
    </thead>
    <tbody>
      @php
          $total=0;
      @endphp
        @foreach ($cartItems as $item)
        <tr class="product_data">
            <td>{{$item->products->name}}</td>
            <input type="hidden" class="prod_id" value="{{$item->product_id}}">
            <td><img src="{{asset('assetsAi/uploads/products/'.$item->products->image)}}" alt="" width="55"></td>
            <td><i class="fa fa-inr"></i> &nbsp; {{number_format($item->products->selling_price,2)}}/-</td>
            <td><div class="w-50 text-center ms-auto ms-5 meinbhi">
                <span><i class="fa fa-minus custom_cursor updateQty changeQty" onclick="decree('inputtext{{$item->products->id}}')"></i></span> &nbsp;
                
                <input type="number" id="inputtext{{$item->products->id}}" readonly style="width:69px;" value="{{$item->product_qty}}" class="text-center qty_input">
                
                &nbsp;<span><i class="fa fa-plus custom_cursor updateQty changeQty" onclick="incree('inputtext{{$item->products->id}}')"></i></span>
              </div></td>
            <td><a class="btn btn-danger delete_cart_item" href="#"><i class="fa fa-trash"></i> &nbsp; Remove</a></td>
        </tr> 
        @php
           $total += $item->products->selling_price * $item->product_qty;
        @endphp
        @endforeach
        <tr>
          <td colspan="2"><b>Grand Total</b></td>
          <td><b><i class="fa fa-inr"></i> &nbsp; {{number_format($total,2)}}/-</b></td>
          <td colspan="2"><a class="btn btn-outline-primary" href="{{url('checkout')}}">Proceed To Checkout</a></td>
        </tr>
    </tbody>
</table>
     @else
     <div class="card-body text-center">
      <h2 class="text-danger my-5 ">Your Cart is empty</h2>
      <a name="" id="" class="btn btn-primary text-center " href="{{url('dashboard')}}" role="button">Continue Shopping</a>
     </div>
      
  @endif

</div>



<!-- official jquery -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
<!-- official jquery -->

<script>

    function decree(incdec){
      var itemval = document.getElementById(incdec);
      if(itemval.value<=1){
        itemval.value=1;
        alert("min 1 is allowed");
      }else{
        itemval.value=parseInt(itemval.value)-1;
      }
    }
    
    function incree(incdec){
      var itemval = document.getElementById(incdec);
      if(itemval.value>=6){
        itemval.value=6;
        alert("max 6 is allowed");
        
      }else{
        itemval.value=parseInt(itemval.value)+1;
        
      }
     
    }
    </script>

<script>
  $(document).ready(function(){
  $('.delete_cart_item').click(function (e) { 
      e.preventDefault();
      
      var product_id=$(this).closest('.product_data').find('.prod_id').val();
    
      // var product_qty=$(this).closest('.product_data').find('.qty_input').val();
      // alert(product_qty);

      $.ajaxSetup({
headers: {
  'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
}
});
$.ajax({
type: "POST",
url: "/delete_cart_item",
data: {
  'product_id':product_id,
  // 'product_qty':product_qty,
},

success: function (response) {
  window.location.reload();
  // swal("",response.status,"success");
  
}

});
      
  });


  // $('.changeQty').click(function (e) { 
  //   e.preventDefault();
  //   alert('hell');
  // });

  $('.changeQty').click(function (e) { 
    e.preventDefault();
    var product_id=$(this).closest('.product_data').find('.prod_id').val();
    var product_qty=$(this).closest('.product_data').find('.qty_input').val();
    // alert(product_qty);

    $.ajaxSetup({
headers: {
  'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
}
});

$.ajax({
type: "POST",
url: "/update_cart",
data: {
  'product_id':product_id,
  'product_qty':product_qty,
},

success: function (response) {
  window.location.reload();
  // alert(response.status);
  swal(response.status);
  
}

});


    
  });
})
</script>

@endsection



