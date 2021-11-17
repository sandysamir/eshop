@extends('layouts.inc.front')
@section('title')
Products
@endsection
@section('content')
<div class="py-5">
    <div class="container">
    <div class="row">
    <div class="col-md-12">
        <h2>{{$category->name}}</h2>
    <div class="row m-4">
    @foreach ($product as $item)
    <div class="col-md-4 mb-3" >
        <a href="{{url('viewcategory/'.$category->slug.'/'.$item->name)}}">
            <div class="card" style="width:300px; height:470px;">
            <img src="{{asset('assets/uploads/products/'.$item->image)}}"style="width:298px; height:380px;" alt="fd">
            <div class="card-body" style="width:248px; height:70px;">
                <h6>{{$item->name}}</h6>
                        <span class="float-start"> <strong> EGP </strong>{{$item->selling_price}}</span>
                        <span class="float-end"><s>{{$item->original_price}}</s></span>
            </div>
        </div>
    </a>
    </div>
    @endforeach
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
