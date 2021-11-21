@extends('layouts.inc.front')
@section('title')
My Orders
@endsection
@section('content')
<div class="py-3 mb-4 shadow-sm bg-warning border-top">
  <div class="container">
    <h5 class="mb-0"> <a href="{{url('/')}}">
      Home</a>
      /
     My Orders</h5>
  </div>
</div>
<div class="container">
  <div class="row">
    <div class="col-md-12">
      <div class="card">
      <div class="card-header text-center fst-italic">
      
          <h1> My Orders </h1>
      </div>
     
      <div class="card-body shadow">
      <table class="table table-borderless">
        <thead>
          <tr>
            <th>Tracking Number</th>
            <th> Total Price</th>
            <th> status</th>
            <th> Action </th>
          </tr>
        </thead>
        <tbody>
          @foreach ($orders as $item)
              <tr>
                <td>{{$item->tracking_no}}</td>
                <td>{{$item->total_price}}</td>
                <td>{{$item->status == '0'?'pending' : 'completed'}}</td>

                <td><a href="#" class="btn btn-dark">View</a></td>

              </tr>
          @endforeach
        </tbody>
      </table>
    </div>
    </div>
  </div>
</div>
</div>

@endsection
