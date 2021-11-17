@extends('layouts.admin')
@section('content')
<div align="center" style="text-align: center;">

<div class="card"> 
    <div class="card-hearder">
      <h4 class="mt-3">Products page</h4>
    </div>
    <div class="card-body">
        <table class=" fixed table table-bordered table-striped table-hover">
            <thead class="table-dark">
                <tr >
                    <th scope="col">Category</th>
                    <th scope="col">Name</th>
                    <th scope="col">Selling</th>
                    <th scope="col">Images</th>
                    <th scope="col">Actions</th>        
                </tr>
                </thead>
                <tbody>
                    @foreach($product as $product)
                    <tr class="productingRow{{$product->id}}">
                        <td class="text-wrap">{{$product->categories->name}}</td>
                        <td class="text-wrap">{{$product->name}}</td>
                       
                        <td>{{$product->selling_price}}.00</td>
                        <td><img class ="cate-image"src="{{asset('/assets/uploads/products/'.$product->image)}}" ></td>            
                        <td>
                         <a href="{{route('editproduct',$product->id)}}"  edit_product="{{$product->id}}" class="edit_btn btn btn-primary"> Edit</a>
                         <a  href="{{route('deleteproduct',$product->id)}}"  delete_product="{{$product->id}}" class="delete_btn btn btn-danger"> delete </a>
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