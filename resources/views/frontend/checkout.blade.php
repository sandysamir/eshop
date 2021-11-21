@extends('layouts.inc.front')
@section('title')
Checkout
@endsection
@section('content')
<div class="py-3 mb-4 shadow-sm bg-warning border-top">
  <div class="container">
    <h5 class="mb-0"> <a href="{{url('/')}}">
      Home</a>
      /
      <a href="{{url('/checkout')}}">   Checkout</a>
    </div>
</div>
<div class="container mt-3">
  <form action="{{route('place-order')}}" method="POST">
    @csrf
    <div class="row">
        <div class="col-md-6">
            <div class="card">
                <div class="card-body">
                    <h6>Basic Details</h6>
                    <hr>
                    <div class="col-md-12">
                    
                            <div class="d-flex">
                            <div class="mb-3 ">
                              <label for="exampleInputEmail1" class="form-label">First name</label>
                              <input type="text" class="form-control" id="username" value="{{Auth::user()->name}}" name="fname" aria-describedby="emailHelp">
                            </div>
                            <div class="mb-3 mx-3">
                              <label for="exampleInputPassword1" class="form-label">last name </label>
                              <input type="text" class="form-control"  name="lname" value="{{Auth::user()->lname}}"id="exampleInputPassword1">
                            </div>
                        </div>
                        <div class="d-flex">
                            <div class="mb-3 ">
                                <label for="exampleInputEmail1" class="form-label">Email address</label>
                                <input type="email" class="form-control"  name="email" id="exampleInputEmail1" value="{{Auth::user()->email}}"aria-describedby="emailHelp">
                              </div>
                              <div class="mb-3 mx-3">
                                <label for="exampleInputEmail1" class="form-label">Phone</label>
                                <input type="text" class="form-control" name="phone"  id="exampleInputEmail1" value="{{Auth::user()->phone}}" aria-describedby="emailHelp">
                              </div>
                            </div>
                            <div class="d-flex">
                              <div class="mb-3">
                                <label for="exampleInputEmail1" class="form-label">address</label>
                                <input type="text" class="form-control" name="address1" id="exampleInputEmail1" value="{{Auth::user()->address1}}" aria-describedby="emailHelp">
                              </div>
                           
                              <div class="mb-3 mx-3">
                                <label for="exampleInputEmail1" class="form-label">address</label>
                                <input type="text" class="form-control" name="address2" id="exampleInputEmail1" value="{{Auth::user()->address2}}" aria-describedby="emailHelp">
                              </div>
                            </div>
                            <div class="d-flex">
                              <div class="mb-3">
                                <label for="exampleInputEmail1" class="form-label">City</label>
                                <input type="text" class="form-control" name="city" id="exampleInputEmail1" value="{{Auth::user()->city}}" aria-describedby="emailHelp">
                              </div>
                              <div class="mb-3 mx-3">
                                <label for="exampleInputEmail1" class="form-label">state</label>
                                <input type="text" class="form-control" name="state" id="exampleInputEmail1" value="{{Auth::user()->state}}" aria-describedby="emailHelp">
                              </div>
                            </div>
                            <div class="d-flex">
                              <div class="mb-3">
                                <label for="exampleInputEmail1" class="form-label">country</label>
                                <input type="text" class="form-control" name="country" id="exampleInputEmail1"value="{{Auth::user()->country}}" aria-describedby="emailHelp">
                              </div>
                              <div class="mb-3  mx-3">
                                <label for="exampleInputEmail1" class="form-label">pincode</label>
                                <input type="text" class="form-control" name="pincode" id="exampleInputEmail1" value="{{Auth::user()->pincode}}" aria-describedby="emailHelp">
                              </div>
                            </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-5">
            <div class="card">
            <div class="card-body">
               <h5>Order details</h5>
            </div>
            <hr>
            @if ($cartitem->count()>0)
            <table class="table">
                <thead>
                    <th>Name</th>
                    <th>Price</th>
                    <th>Quantity</th>
                </thead>
                <tbody>
                 @foreach ($cartitem as $item)                 
                <tr>  
                    <td>{{$item->products->name}}</td>
                    <td>{{$item->products->selling_price}}</td>
                    <td>{{$item->prod_qty}}</td>

                </tr>
                @endforeach
                </tbody>
            </table>
            <button type="submit" class=" btn btn-primary">Place order</button>
                
            @else
            <div class="p-2 m-2">
            <h2> Your cart is empty!!</h2>
            <p>Browse our categories and discover our best deals!</p>
            <a class="btn btn-warning"href="{{route('categories')}}">Start shoppig</a>
          </div>
            @endif
        </div>
    </div>
    </div>
  </form>
</div>
@endsection
