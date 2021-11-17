@extends('layouts.admin')
@section('content')
<div align="center" class="mr-3">

    <h1>add category</h1>
    <form method='POST'  enctype="multipart/form-data" action="{{route('savecategory')}}" >
        @csrf
          <div class="mb-3">
            <label for="exampleInputEmail1" class="fw-bolder  form-label">Name</label>
            <input type="text" class="form-control text-line" id="exampleInputEmail1" name="name" aria-describedby="emailHelp" style="width:500px; background: transparent;
            border: none;
            border-bottom: 1px solid #000000;">
            @error('name')
                                            
             <strong style="color:red;">you must enter a name</strong>
                                            
            @enderror
          </div>
          <div class="mb-3">
            <label for="exampleInputEmail1" class="fw-bolder form-label">Slug</label>
            <input type="text" class="form-control text-line" id="exampleInputEmail1" name="slug" aria-describedby="emailHelp" style="width:500px; background: transparent;
            border: none;
            border-bottom: 1px solid #000000;">
            @error('slug')
                                            
             <strong style="color:red;">you must enter a slug</strong>
                                            
            @enderror
          </div>
          <div class="mb-3">
            <label for="exampleInputPassword1" class="fw-bolder form-label"> Decription</label>
            <textarea class="form-control" name="description" id="exampleFormControlTextarea1" rows="2" style="width:500px; background: transparent;
            border: none;
            border-bottom: 1px solid #000000; "></textarea>
          
              @error('description')
                                            
               <strong style="color:red;">you must enter a description</strong>
                                                                           
              @enderror
          </div>
        
        <div class="form-check">
          <input  class="form-check-input" name="status" type="checkbox" >
          <label class="form-check-label " for="flexCheckChecked">
             Status
          </label>
        </div><div class="form-check">
          <input class="form-check-input" type="checkbox"  name="popular"  >
          <label class="form-check-label" for="flexCheckChecked">
            Popular
          </label>
         </div>
          <div class="mb-3">
            <label for="exampleInputPassword1" class="fw-bolder form-label">Meta Title</label>
            <input type="text" class="form-control text-line" id="exampleInputPassword1"  name="meta_title" style="width:500px; background: transparent;
            border: none;
            border-bottom: 1px solid #000000;">
                @error('meta_title')
                                            
                 <strong style="color:red;"> you must enter a price</strong>
                                                                           
              @enderror
          </div>
          <div class="mb-3">
            <label for="exampleInputPassword1" class="fw-bolder form-label">Meta description</label>
            <textarea class="form-control" id="exampleFormControlTextarea1"  name="meta_descrip" rows="2" style="width:500px; background: transparent;
            border: none;
            border-bottom: 1px solid #000000; "></textarea>
                @error('meta_descrip')
                                            
                 <strong style="color:red;"> you must enter a Meta description</strong>
                                                                           
              @enderror
          </div>
          <div class="mb-3">
            <label for="exampleInputPassword1" class="fw-bolder form-label">Meta keywords</label>
            <textarea class="form-control" id="exampleFormControlTextarea1" name="meta_keywords"  rows="2" style="width:500px; background: transparent;
            border: none;
            border-bottom: 1px solid #000000; "></textarea>
                @error('meta_keywords')
                                            
                 <strong style="color:red;"> you must enter a Meta keywords</strong>
                                                                           
              @enderror
          </div>
          <div class="mb-3">
            <label for="exampleInputPassword1" class="fw-bolder form-label">Image</label>
            <input type="file" class="form-control text-line" id="exampleInputPassword1"  name="image" style="width:500px; background: transparent;
            border: none;
            border-bottom: 1px solid #000000;">
          </div>
          <button id="save_booking" class="btn btn-primary">Add category</button>
        </form>
@stop
</div>