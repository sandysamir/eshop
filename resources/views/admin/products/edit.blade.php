@extends('layouts.admin')
@section('content')
<div align="center" class="mr-3">

    <h1>Edit Product</h1>
    <form method='POST'  enctype="multipart/form-data" action="{{route('updateproduct',$product->id)}}" >
        @csrf
            <div class="mb-3">
              <select class="form-select options mb-4" name="cate_id" >
                <option class="m-3" value="{{$product->categories->id}}">{{$product->categories->name}}</option>
                @foreach ($category as $category)
                <option value="{{$category->id}}">{{$category->name}}</option>
                @endforeach
              </select>
            <div class="mb-3">
            <label for="exampleInputEmail1" class="fw-bolder  form-label">Name</label>
            <input type="text" class="form-control text-line" id="exampleInputEmail1" value="{{$product->name}}" name="name" aria-describedby="emailHelp" style="width:500px; background: transparent;
            border: none;
            border-bottom: 1px solid #000000;">
            @error('name')
                                            
             <strong style="color:red;">you must enter a name</strong>
                                            
            @enderror
          </div>
          <div class="mb-3">
            <label for="exampleInputEmail1" class="fw-bolder form-label">small_description</label>
            <input type="text" class="form-control text-line" id="exampleInputEmail1" value="{{$product->small_description}}" name="small_description" aria-describedby="emailHelp" style="width:500px; background: transparent;
            border: none;
            border-bottom: 1px solid #000000;">
            @error('small_description')
                                            
             <strong style="color:red;">you must enter a small_description</strong>
                                            
            @enderror
          </div>
          <div class="mb-3">
            <label for="exampleInputPassword1" class="fw-bolder form-label"> Decription</label>
            <textarea class="form-control" name="description" id="exampleFormControlTextarea1" rows="2" style="width:500px; background: transparent;
            border: none;
            border-bottom: 1px solid #000000; ">{{$product->small_description}}</textarea>
          
              @error('description')
                                            
               <strong style="color:red;">you must enter a description</strong>
                                                                           
              @enderror
          </div>
          <div class="mb-3">
            <label for="exampleInputEmail1" class="fw-bolder  form-label">original price</label>
            <input type="number" class="form-control text-line" id="exampleInputEmail1" name="original_price"  value="{{$product->original_price}}" aria-describedby="emailHelp" style="width:500px; background: transparent;
            border: none;
            border-bottom: 1px solid #000000;">
            @error('original_price')
                                            
             <strong style="color:red;">you must enter a original_price</strong>
                                            
            @enderror
          </div>
          <div class="mb-3">
            <label for="exampleInputEmail1" class="fw-bolder  form-label">selling price</label>
            <input type="number" class="form-control text-line" id="exampleInputEmail1"  value="{{$product->selling_price}}"  name="selling_price" aria-describedby="emailHelp" style="width:500px; background: transparent;
            border: none;
            border-bottom: 1px solid #000000;">
            @error('selling_price')
                                            
             <strong style="color:red;">you must enter a selling_price</strong>
                                            
            @enderror
          </div>
          <div class="mb-3">
            <label for="exampleInputEmail1" class="fw-bolder  form-label">Quantity</label>
            <input type="number" class="form-control text-line" id="exampleInputEmail1" value="{{$product->qty}}"  name="qty" aria-describedby="emailHelp" style="width:500px; background: transparent;
            border: none;
            border-bottom: 1px solid #000000;">
            @error('qty')
                                            
             <strong style="color:red;">you must enter a qty</strong>
                                            
            @enderror
          </div>
          <div class="mb-3">
            <label for="exampleInputEmail1" class="fw-bolder  form-label">tax</label>
            <input type="number" class="form-control text-line" id="exampleInputEmail1" value="{{$product->tax}}"  name="tax" aria-describedby="emailHelp" style="width:500px; background: transparent;
            border: none;
            border-bottom: 1px solid #000000;">
            @error('tax')
                                            
             <strong style="color:red;">you must enter a tax</strong>
                                            
            @enderror
          </div>
        <div class="form-check">
          <input  class="form-check-input"{{$product->status =='1'? 'checked': ''}} name="status" type="checkbox" >
          <label class="checkk form-check-label " for="flexCheckChecked">
             Status
          </label>
        </div><div class="form-check">
          <input class="form-check-input" type="checkbox" {{$category->trending =='1'? 'checked': ''}}  name="trending"  >
          <label class="checkk form-check-label" for="flexCheckChecked">
            trending
          </label>
         </div>
          <div class="mb-3">
            <label for="exampleInputPassword1" class="fw-bolder form-label">Meta Title</label>
            <input type="text" class="form-control text-line" id="exampleInputPassword1" value="{{$product->meta_title}}"  name="meta_title" style="width:500px; background: transparent;
            border: none;
            border-bottom: 1px solid #000000;">
                @error('meta_title')
                                            
                 <strong style="color:red;"> you must enter a Meta Title</strong>
                                                                           
              @enderror
          </div>
          <div class="mb-3">
            <label for="exampleInputPassword1" class="fw-bolder form-label">Meta description</label>
            <textarea class="form-control" id="exampleFormControlTextarea1"  name="meta_description" rows="2" style="width:500px; background: transparent;
            border: none;
            border-bottom: 1px solid #000000; ">{{$product->meta_description}}</textarea>
                @error('meta_description')
                                            
                 <strong style="color:red;"> you must enter a Meta description</strong>
                                                                           
              @enderror
          </div>
          <div class="mb-3">
            <label for="exampleInputPassword1" class="fw-bolder form-label">Meta keywords</label>
            <textarea class="form-control" id="exampleFormControlTextarea1" name="meta_keywords"  rows="2" style="width:500px; background: transparent;
            border: none;
            border-bottom: 1px solid #000000; ">{{$product->meta_keywords}}</textarea>
                @error('meta_keywords')
                                            
                 <strong style="color:red;"> you must enter a Meta keywords</strong>
                                                                           
              @enderror
          </div>
          @if($category->image)
          <img class="cate-image" src="{{asset('assets/uploads/products/'.$product->image)}}" alt="products image">
          @endif
          <div class="mb-3">
            <label for="exampleInputPassword1" class="fw-bolder form-label">Image</label>
            <input type="file" class="form-control text-line" id="exampleInputPassword1"  name="image" style="width:500px; background: transparent;
            border: none;
            border-bottom: 1px solid #000000;">
          </div>
          <button id="save_booking" class="btn btn-primary">Update Category</button>
        </form>
@stop
</div>