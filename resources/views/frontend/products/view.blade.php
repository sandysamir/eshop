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
    <div class="container  shadow product_data">
        <div class="row">
            <div class="item m-1" >
                <div class="card mb-3" style="max-width:1200px; max-height: 718px;">
                    <div class="row g-0">
                      <div class="col-md-4">
                        <img src="{{asset('assets/uploads/products/'.$product->image)}}" class="img-fluid rounded-start" style="width:330px; height:416px;" alt="fd">
                      </div>
                      <div class="col-md-8">
                        <div class="card-body">
                          <h3 class="card-title">{{$product->name}}
                            @if ($product->trending=='3')
                            <label style="font-size: 16px;" class="float-end badge bg-danger trending-tag  rounded-pill "> Trending</label>
                            @endif
                          </h3>
                          <br>
                          <label style="font-size: 18px;" class="me-3"> <s>Original Price {{$product->original_price}}.00 LE</s></label>
                          <label style="font-size: 18px;" class="fw-bold"> Selling Price {{$product->selling_price}}.00 LE</label>

                          <p class="card-text" style="font-size: 14px;">{{$product->description}}This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
                          <hr>
                          @if($product->qty>0)
                            <label style="font-size: 16px;" class=" badge bg-success"> In Stock</label>
                          @else
                            <label style="font-size: 16px;" class=" badge bg-danger"> Out of Stock</label>
                          
                          @endif
                        <div class="row mt-2">
                          <div class="col-md-3"> 
                            <input type="hidden" value="{{$product->id}}" class="prod_id">
                            <label for="Quantity"> Quantity</label>
                            <div class="input-group text-center mb-3 mt-1">
                              <button class="input-group-text bg-danger btn decrement-btn"style="height: 40px; width:40px; color:white;">-</button>
                              <input type="text"name="quantity" value="1" style="height: 40px; width:40px; " class="form-control qty-input" >
                              <button class="input-group-text bg-success increment-btn " style="height: 40px; width:40px;color:white;">+</button>
                            </div> 

                          </div>
                        </div>
                        <div class="d-flex" >
                          <button type="button" class=" btn btn-success"><span class="mb-2"> Add To Wishlist</span> <img class="mb-1" src="https://img.icons8.com/small/16/ffffff/hearts.png"/>
                          </button>
                          @if($product->qty>0)
                          <button type="button" class=" mr-1 btn mx-1 btn-primary addtocardBtn" data-bs-toggle="modal" data-bs-target="#exampleModal">Add To Cart<img class="m-1" src="https://img.icons8.com/small/16/ffffff/add-shopping-cart.png"/></button>
                          @endif
                        </div>
                        </div>
                      </div>
                    </div>
                  </div>
            </div>
           
        </div>
    </div>
</div>


<!-- Modal -->
<div class="modal fade success_msg" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">{{$product->name}}</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
Added To your Cart      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-primary" data-bs-dismiss="modal">Done</button>
      </div>
    </div>
  </div>
</div>
@endsection

