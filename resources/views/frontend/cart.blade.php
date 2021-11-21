@extends('layouts.inc.front')
@section('title')
My Cart
@endsection
@section('content')
<div class="py-3 mb-4 shadow-sm bg-warning border-top">
  <div class="container">
    <h5 class="mb-0"> <a href="{{url('categories')}}">
      Products</a>
      /
     Cart</h5>
  </div>
</div>
<div class="container my-3">
    <div class="card shadow text-center ">
      @if ($cart->count()>0)
        <div class="card-body">
            @php $total=0; @endphp
            @foreach ($cart  as $item)
            <div class="row product_data">
                <div class="col-md-2">
                    <img src="{{asset('assets/uploads/products/'.$item->products->image)}}" class="img-fluid rounded-start m-2" style="height: 70px; width:70px;"alt="fd">
                </div>
                <div class="col-md-4">
                    <p class=" mt-3">{{$item->products->name}}</p>
                </div>
                <div class="col-md-2 ">
                    <input type="hidden"  class="prod_id" value="{{$item->products->id}}">
                    @if($item->prod_qty<=$item->products->qty)
                    <label for="Quantity"> Quantity</label>
                    <div class="input-group text-center mb-3 mt-1">
                      <button class="input-group-text bg-danger btn changeQnty decrement-btn"style="height: 40px; width:40px; color:white;">-</button>
                      <input type="text"name="quantity" value="{{$item->prod_qty}}" style="height: 40px; width:40px; " class="form-control qty-input" >
                      <button class="input-group-text bg-success changeQnty increment-btn " style="height: 40px; width:40px;color:white;">+</button>
                    </div> 
                    @else
                    <label style="font-size: 16px;" class=" badge bg-danger mt-4"> Out of Stock</label>
                    @endif
                </div>
                <div class="col-md-2 ">
                    <p class="mt-4">{{$item->products->selling_price}}</p>             
                   </div>
                <div class="col-md-1 ">
                  <button type="button" class="btn mt-4 delete-cart-item">
                      <img src="https://img.icons8.com/material/26/fa314a/filled-trash.png"/>
                    </button>               
                 </div>
            </div>
            @php $total+=$item->products->selling_price*$item->prod_qty; @endphp
            @endforeach 
        </div>
        <div class="card-footer">
        <div class="float-end">
          <h6 class=" m-3 " style="color: brown">Total Price : EGP {{$total}}.00 </h6>
          <a href="{{route('checkout')}}" type="button" class="btn btn-success">Continue To Checkout</a>
          <a href="{{route('checkout')}}" type="button" class="btn btn-warning">Continue Shopping</a>

        </div>
        @else
          <div class="card-body text-center text-muted">
            <img src="https://img.icons8.com/ios/100/000000/shopping-cart-loaded--v2.png"/>
            <h2 > Your cart is empty!!</h2>
            <p>Browse our categories and discover our best deals!</p>
            <a class="btn btn-warning"href="{{route('categories')}}">Start shoppig</a>
          </div>
        @endif
        </div>
    </div>
</div>
@endsection
