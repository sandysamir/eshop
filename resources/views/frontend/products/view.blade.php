@extends('layouts.inc.front')
@section('title')
{{$product->name}}
@endsection
@section('content')
<div class="py-3 mb-4 shadow-sm bg-warning border-top">
  <div class="container">
    <h5 class="mb-0"> <a href="{{url('categories')}}">
      Products</a>
      /
      <a href="{{url('viewcategory/'.$category->slug)}}"> {{$product->categories->name}}
      </a>/{{$product->name}}</h5>
  </div>
</div>
    <div class="container shadow">
        <div class="row">
            <div class="item m-1" >
                <div class="card mb-3" style="max-width:1700px; height: 518px;">
                    <div class="row g-0">
                      <div class="col-md-4">
                        <img src="{{asset('assets/uploads/products/'.$product->image)}}" class="img-fluid rounded-start" style="width:430px; height:506px;" alt="fd">
                      </div>
                      <div class="col-md-8">
                        <div class="card-body">
                          <h1 class="card-title">{{$product->name}}
                            @if ($product->trending=='1')
                            <label style="font-size: 16px;" class="float-end badge bg-danger trending-tag  rounded-pill "> Trending</label>
                            @endif
                          </h1>
                          <br>
                          <label style="font-size: 22px;" class="me-3"> <s>Original Price {{$product->original_price}}.00 LE</s></label>
                          <label style="font-size: 22px;" class="fw-bold"> Selling Price {{$product->selling_price}}.00 LE</label>

                          <p class="card-text">{{$product->description}}This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
                          <hr>
                          @if($product->qty>0)
                            <label style="font-size: 16px;" class=" badge bg-success"> In Stock</label>
                          @else
                            <label style="font-size: 16px;" class=" badge bg-danger"> Out of Stock</label>
                          
                          @endif
                          <p class="card-text"><small class="text-muted">{{$product->small_description}}Last updated 3 mins ago</small></p>
                        <div class="row mt-2">
                          <div class="col-md-3">
                            <label for="Quantity"> Quantity</label>
                            <div class="input-group text-center mb-3 mt-1">
                              <span class="input-group-text bg-danger btn"style="height: 40px; width:40px; color:white;">-</span>
                              <input type="text"name="quantity" value="1" style="height: 40px; width:40px; " class="form-control" >
                              <span class="input-group-text bg-success " style="height: 40px; width:40px;color:white;">+</span>
                            </div> 

                          </div>
                        </div>
                        <div class="d-flex" >
                          <button type="button" class=" btn btn-success"> Wishlist <i class="material-icons opacity-10">favorite</i>
                          </button>
                          <button type="button" class="btn mx-1 btn-primary">Cart <i class=" mt-1 material-icons opacity-10">add_shopping_cart</i></button>
                        </div>
                        </div>
                      </div>
                    </div>
                  </div>
            </div>
           
        </div>
    </div>
</div>
@endsection
@section('script')
<script>
$('.owl-carousel').owlCarousel({
    loop:true,
    margin:10,
    nav:true,
    responsive:{
        0:{
            items:1
        },
        600:{
            items:3
        },
        1000:{
            items:5
        }
    }
});
 </script>
@endsection
