<?php

namespace App\Http\Controllers\Frontend;
use App\Http\Controllers\Controller;
use App\Models\Categories;
use App\Models\Product;
use Illuminate\Http\Request;

class FrontendController extends Controller
{
    //
    public function index(){
        $featured_product=Product::where('trending','1')->take('10')->get();
        $featured_category=Categories::where('popular','1')->take('10')->get();
        return view('frontend.index',compact('featured_product','featured_category'));
    }
    public function category(){
        $category=Categories::where('status','0')->get();
        return view('frontend.category',compact('category'));
    }
    public function viewcategory($slug){
        if(Categories::where('slug',$slug)->exists()){
            $category=Categories::where('slug',$slug)->first();
            $product=Product::where('cate_id',$category->id)->where('status','0')->get();
            // return $product;
        return view('frontend.products.index',compact('category','product'));

        }    
        return redirect('/')->with('status','slug doesnot exists ??!!');
    }
    public function viewproduct($cate_slug,$prod_name){
        if(Categories::where('slug',$cate_slug)->exists()){
            if(Product::where('name',$prod_name)->exists()){

            }
            else {
                return redirect('/')->with('status','product doesnot exists ??!!');
            }
            $product=Product::where('name',$prod_name)->first();
            $category=Categories::where('slug',$cate_slug)->first();
            return view('frontend.products.view',compact('product','category'));

        }  
        else{
            return redirect('/')->with('status','slug doesnot exists ??!!');

        }  
    }
}
