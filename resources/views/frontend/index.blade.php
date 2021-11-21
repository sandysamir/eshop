@extends('layouts.inc.front')
@section('title')
    welcome E-shop
@endsection
@section('content')
@include('layouts.inc.slider')
<div class="py-4">
    <div class="container">
        <div class="row">
            <h2>Featured Products</h2>
            <div class="owl-carousel feature-carousel owl-theme m-2">
                @foreach ($featured_product as $item)
            <div class="item" >
                <div class="card"style="width:250px; height:400px;">
                    <img src="{{asset('assets/uploads/products/'.$item->image)}}" style="width:248px; height:300px;" alt="fd">
                    <div class="card-body" style="width:248px; height:50px;">
                        <h6>{{$item->name}}</h6>
                        <span class="float-start"> <strong> EGP </strong>{{$item->selling_price}}</span>
                        <span class="float-end"><s>{{$item->original_price}}</s></span>

                    </div>
                </div>
            </div>
            @endforeach
            </div>
           
        </div>
    </div>
</div>
<div class="py-4">
    <div class="container">
        <div class="row">
            <h2>Trending Category</h2>
            <div class="owl-carousel feature-carousel owl-theme">
              @foreach ($featured_category as $item)
            <div class="item" >
                <a href="{{url('viewcategory/'.$item->slug)}}">
                    <div class="card" style="width:250px; height:400px;">
                        <img src="{{asset('assets/uploads/category/'.$item->image)}}"style="width:248px; height:300px;" alt="fd">
                        <div class="card-body"style="width:248px; height:50px;">
                            <h6>{{$item->name}}</h6>
                            <p>
                                {{$item->description}}
                            </p>
                        </div>
                    </div>
                </a>
            </div>  
            @endforeach 
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
            items:4
        }
    }
});
 </script>
@endsection