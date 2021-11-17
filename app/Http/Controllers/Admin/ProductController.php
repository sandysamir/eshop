<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Categories;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File; 


class ProductController extends Controller
{
    public function index(){
        $product=Product::all();
        return view('admin.products.index',compact('product'));
    }
    public function add(){
        $category=Categories::all();
        return view('admin.products.add',compact('category'));
        }
    public function save(request $request){
           $product= new Product();
           if($request->hasFile('image')){
               $file=$request->file('image');
               $ext=$file->getClientOriginalExtension();
               $filename=time().'.'.$ext;
               $file->move('assets/uploads/products',$filename);
               $product->image=$filename;
           }
           $product->cate_id=$request->input('cate_id');
           $product->name=$request->input('name');
           $product->small_description=$request->input('small_description');
           $product->description=$request->input('description');
           $product->original_price=$request->input('original_price');
           $product->selling_price=$request->input('selling_price');
           $product->qty=$request->input('qty');
           $product->tax=$request->input('tax');
           $product->status=$request->input('status') == TRUE ?'1':'0';
           $product->trending=$request->input('trending') == TRUE ?'1':'0';
           $product->meta_title=$request->input('meta_title');
           $product->meta_description=$request->input('meta_description');
           $product->meta_keywords=$request->input('meta_keywords');
           $product->save();
           return redirect()->action([ProductController::class, 'index'])->with('status','product saved successfully');
        }
    public function edit($id){
            $category=Categories::all();
            $product = Product::find($id);
            return view('admin.products.edit',compact('product','category'));
            }
    public function update(Request $request,$id){
            
            $product = Product::find($id);
                if($request->hasFile('image'))
                {
                      $path='assets/uploads/product/'.$product->image;
                      if(File::exists($path)){
                          File::delete($path);
                      }
                      $file=$request->file('image');
                      $ext=$file->getClientOriginalExtension();
                      $filename=time().'.'.$ext;
                      $file->move('assets/uploads/products',$filename);
                      $product->image=$filename;
                }
            
            $product->cate_id=$request->input('cate_id');
            $product->name=$request->input('name');
            $product->small_description=$request->input('small_description');
            $product->description=$request->input('description');
            $product->original_price=$request->input('original_price');
            $product->selling_price=$request->input('selling_price');
            $product->qty=$request->input('qty');
            $product->tax=$request->input('tax');
            $product->status=$request->input('status') == TRUE ?'1':'0';
            $product->trending=$request->input('trending') == TRUE ?'1':'0';
            $product->meta_title=$request->input('meta_title');
            $product->meta_description=$request->input('meta_description');
            $product->meta_keywords=$request->input('meta_keywords');
            $product->update();
            return redirect()->action([ProductController::class, 'index'])->with('status','product updated successfully');
         }
         public function delete($id){
            $product = Product::find($id);
            if($product->image)
            {
                  $path='assets/uploads/products/'.$product->image;
                  if(File::exists($path)){
                      File::delete($path);
                      }
            }
            $product->delete();
            return redirect('product')->with('status','Product deleted successfully');

            } 
}
