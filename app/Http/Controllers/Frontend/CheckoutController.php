<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Cart;
use App\Models\Order;
use App\Models\User;
use App\Models\order_items;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CheckoutController extends Controller
{
    public function index(){
        $old_cartitem=Cart::where('user_id',Auth::id())->get();
        foreach($old_cartitem as $item){
            if(!Product::where('id',$item->prod_id)->where('qty','>=',$item->prod_qty)->exists())
            {
                $removeItem=Cart::where('user_id',Auth::id())->where('prod_id',$item->prod_id)->first();
                $removeItem->delete();
            }
           
        }
        $cartitem=Cart::where('user_id',Auth::id())->get();

         return view('frontend.checkout',compact('cartitem'));
    }
    public function placeorder(Request $request){
        $order=new Order();
        $order->user_id=Auth::id();
        $order->fname=$request->input('fname');
        $order->lname=$request->input('lname');
        $order->email=$request->input('email');
        $order->phone=$request->input('phone');
        $order->address1=$request->input('address1');
        $order->address2=$request->input('address2');
        $order->city=$request->input('city');
        $order->state=$request->input('state');
        $order->country=$request->input('country');
        $order->pincode=$request->input('pincode');
        // to calculate total price
        $total=0;
        $cartitems_total=Cart::where('user_id',Auth::id())->get();
        foreach($cartitems_total as $prod){
            $total+= $prod->products->selling_price;
        }
        $order->total_price=$total;
        $order->tracking_no='sandy'.rand('1111','99999');
        $order->save();

        $cartitem=Cart::where('user_id',Auth::id())->get();
        foreach($cartitem as $item){
            order_items::create([
                'order_id'=>$order->id,
                'prod_id'=>$item->prod_id,
                'qty'=>$item->prod_qty,
                'price'=>$item->products->selling_price,

            ]);
            $prod=Product::where('id',$item->prod_id)->first();
            $prod->qty = $prod->qty - $item->prod_qty;
            $prod->update();
        }
        if(Auth::user()->address1== NULL){
        $user=User::where('id', Auth::id())->first();
        $user->lname=$request->input('lname');
        $user->phone=$request->input('phone');
        $user->address1=$request->input('address1');
        $user->address2=$request->input('address2');
        $user->city=$request->input('city');
        $user->state=$request->input('state');
        $user->country=$request->input('country');
        $user->pincode=$request->input('pincode');
        $user->update();
        }
        $cartitem=Cart::where('user_id',Auth::id())->get();
        Cart::destroy($cartitem);
        return redirect('/')->with('status','Order placed successfully');

    }
}
