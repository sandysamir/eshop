@extends('layouts.admin')
@section('content')
<div align="center" style="text-align: center;">

<div class="card"> 
    <div class="card-hearder">
      <h4 class="mt-3">Category page</h4>
    </div>
    <div class="card-body">
        <table class="table table-bordered table-striped table-hover">
            <thead class="table-dark">
                <tr >
                    <th scope="col">Name</th>
                    <th scope="col">Description</th>
                    <th scope="col">Images</th>
                    <th scope="col">Actions</th>        
                </tr>
                </thead>
                <tbody>
                    @foreach($category as $category)
                    <tr class="categoryingRow{{$category->id}}">
                        <td class="text-wrap">{{$category->name}}</td>
                        <td class="text-wrap">{{$category->description}}</td>
                        <td><img class ="cate-image"src="{{asset('/assets/uploads/category/'.$category->image)}}" ></td>            
                        <td>
                         <a href="{{route('editcategory',$category->id)}}"  edit_category="{{$category->id}}" class="edit_btn btn btn-primary"> Edit</a>
                         <a  href="{{route('deletecategory',$category->id)}}"  delete_category="{{$category->id}}" class="delete_btn btn btn-danger"> delete </a>
                        </td>
                        </div>
                    </tr>
                    @endforeach
                </tbody>
                </table>
    </div>
</div>
</div>

@stop