@extends('layouts.inc.front')
@section('title')
Category
@endsection
@section('content')
<div class="py-4">
    <div class="container">
    <div class="row">
    <div class="col-md-12">
        <h2> All Categories</h2>
    <div class="row m-3">
    @foreach ($category as $item)
    <div class="col-md-4 mb-3" >
        <a href="{{url('viewcategory/'.$item->slug)}}">
        <div class="card" style="width:350px; height:500px;">
            <img src="{{asset('assets/uploads/category/'.$item->image)}}"style="width:348px; height:380px;" alt="fd">
            <div class="card-body" style="width:248px; height:50px;">
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
</div>    
@endsection
