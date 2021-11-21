<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\Cart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
class CartController extends Controller
{
    public function add(Request $request){
        $product_id=$request->input('product_id');
        $product_qty=$request->input('product_qty');
        if(Auth::Check()){
            $prod_check=Product::where('id', $product_id)->get();
            $prod_check1 =  $prod_check->first();
            $prod_check2 =   $prod_check1->name;
            if( $prod_check){
                if(Cart::where('prod_id', $product_id)->where('user_id',Auth::id())->exists())
                {
                    return response()->json(['status'=>$prod_check2."Already added To Cart"]);
                }
                else{
                    $cartitem= new Cart();
                    $cartitem->prod_id=$product_id;
                    $cartitem->user_id=Auth::id();
                    $cartitem->prod_qty=$product_qty;
                    $cartitem->save();
                    return response()->json(['status'=>$prod_check2 ."  "."Added To Cart"]);
    
                
               
            } }

        }
        else
        {
            return response()->json(['status'=>"Login To continue"]);
        }
    }
    public function cart(){
        $cart=Cart::where('user_id',Auth::id())->get();
        return view('frontend.cart',compact('cart'));

    }
    public function deleteCartItem(Request $request){
        if(Auth::Check()){
        $prod_id=$request->input('prod_id');
           if(Cart::where('prod_id', $prod_id)->where('user_id',Auth::id())->exists())
        {
            $cartitem=Cart::where('prod_id', $prod_id)->where('user_id',Auth::id())->first();
            $cartitem->delete();
            return response()->json(['status'=>"Deleted"]);

        }
        else{
            return response()->json(['status'=>"Login To continue"]);

        }
        }
    }
    public function updateCartItem(Request $request){
        $prod_id=$request->input('prod_id');
        $qty=$request->input('qty');
        if(Auth::Check()){

        if(Cart::where('prod_id', $prod_id)->where('user_id',Auth::id())->exists())
        {
            $cart=Cart::where('prod_id', $prod_id)->where('user_id',Auth::id())->first();
            $cart->prod_qty=$qty;
            $cart->update();
            return response()->json(['status'=>"updated"]);
        }
    }
    }
}
