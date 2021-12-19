<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Category;
use App\Models\Coupon;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Str;
use Input;
use function GuzzleHttp\Promise\all;

class CartController extends Controller
{
    public function cart($coupon_code = '')
    {
        if (Coupon::where('coupon_name', $coupon_code)->exists()) {
            if (Carbon::now()->format('Y-m-d') > Coupon::where('coupon_name', $coupon_code)->first()->validity) {
                $discount = 0;
                return back()->with('expired', 'Coupon Expired');
            }
            
            else {
                $discount = Coupon::where('coupon_name', $coupon_code)->first()->discount;
            }
        }
        else {
            $discount = 0;
        }
        $categories = Category::all();
        $cart_products = Cart::where('random_generated_id', Cookie::get('cart_cookie'))->where('status', 1)->get();
        $cart_count = Cart::where('random_generated_id', Cookie::get('cart_cookie'))->where('status', 1)->count();
        return view('frontend.cart', compact('categories', 'cart_products',  'discount', 'coupon_code', 'cart_count'));
    }

    function add_to_cart(Request $request)
    {        
        // print_r($request->all());
        // dd();
        if (Cookie::get('cart_cookie')) {
            $random_generated_id = Cookie::get('cart_cookie');
        } else {
            //$expires = time() + 60 * 60 * 24 * 7; // Seven Days
            $random_generated_id = Str::random(7) . time();
            Cookie::queue('cart_cookie', $random_generated_id, 7200);
        }
        
        if (Cart::where('random_generated_id', $random_generated_id)->where('product_id', $request->product_id)->where('status', 1)->exists()) {
            Cart::where('random_generated_id', Cookie::get('cart_cookie'))->where('product_id', $request->product_id)->increment('product_quantity', $request->product_quantity);
        } elseif (Cart::where('random_generated_id', $random_generated_id)->where('product_id', $request->product_id)->where('status', 2)->exists()) {
            Cart::where('random_generated_id', $random_generated_id)->where('product_id', $request->product_id)->update([
                'status' => 1,
                'product_quantity' => $request->product_quantity,
            ]);
        }
        
        else {
            Cart::insert([
                'random_generated_id' => $random_generated_id,
                'product_id' => $request->product_id,
                'product_quantity' => $request->product_quantity,
                'status' => 1,
                'created_at' => Carbon::now(),

            ]);
        }
        return back();
    }

    function addtocart($product_id)
    {
        if (Cookie::get('cart_cookie')) {
            $random_generated_id = Cookie::get('cart_cookie');
        } else {
            $random_generated_id = Str::random(7) . time();
            Cookie::queue('cart_cookie', $random_generated_id, 7200);
        }
        if (Cart::where('random_generated_id', $random_generated_id)->where('product_id', $product_id)->where('status', 1)->exists()) {
            Cart::where('random_generated_id', Cookie::get('cart_cookie'))->where('product_id', $product_id)->increment('product_quantity', 1);
        } elseif (Cart::where('random_generated_id', $random_generated_id)->where('product_id', $product_id)->where('status', 2)->exists()) {
            Cart::where('random_generated_id', $random_generated_id)->where('product_id', $product_id)->update([
                'status' => 1,
            ]);
        } else {
            Cart::insert([
                'random_generated_id' => $random_generated_id,
                'product_id' => $product_id,
                'product_quantity' => 1,
                'status' => 1,
                'created_at' => Carbon::now(),
            ]);
        }
        return back();
    }

    function addtowish($product_id)
    {
        if (Cookie::get('cart_cookie')) {
            $random_generated_id = Cookie::get('cart_cookie');
        } else {
            $random_generated_id = Str::random(7) . time();
            Cookie::queue('cart_cookie', $random_generated_id, 7200);
        }
        if (Cart::where('random_generated_id', $random_generated_id)->where('product_id', $product_id)->exists()) {
            return back();
        } else {
            Cart::insert([
                'random_generated_id' => $random_generated_id,
                'product_id' => $product_id,
                'product_quantity' => 1,
                'status' => 2,
                'created_at' => Carbon::now(),
            ]);
        }
        return back();
    }
    function delete_cart($cart_id)
    {        
        Cart::find($cart_id)->Delete();
        return back()->with('delete', ' Deleted successfully!');
    }
    function mark_add_to_cart(Request $request){
        
        foreach ($request->mark_add_to_cart as $cart_single) {
            Cart::find($cart_single)->update([
                'status' => 1,
            ]);
        }
        return redirect('/cart');
    }

    function cart_update(Request $request){
  
        foreach ($request->cart_update as $cart_id => $product_quantity) {
            Cart::find($cart_id)->update([
                'product_quantity'=> $product_quantity,
            ]);            
        }
        return back();
    }

}
