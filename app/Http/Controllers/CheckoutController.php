<?php

namespace App\Http\Controllers;

use App\Http\Requests\OrderRequest;
use App\Models\Category;
use App\Models\Country;
use App\Models\City;
use App\Models\Order;
use App\Models\Coupon;
use App\Models\Order_Billing_details;
use App\Models\Cart;
use App\Models\Order_Product_Details;
use App\Models\Product;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
use Illuminate\Http\Request;




class CheckoutController extends Controller
{
    public function checkout($coupon_code = '')
    {
        if (Coupon::where('coupon_name', $coupon_code)->exists()) {
            if (Carbon::now()->format('Y-m-d') > Coupon::where('coupon_name', $coupon_code)->first()->validity) {
                $discount = 0;
                return back()->with('expired', 'Coupon Expired');
            } else {
                $discount = Coupon::where('coupon_name', $coupon_code)->first()->discount;
                $coupon = Coupon::where('coupon_name', $coupon_code)->first()->coupon_name;
            }
        } else {
            $coupon = '';
            $discount = 0;
        }
        $categories = Category::all();
        $cart_products = Cart::where('random_generated_id', Cookie::get('cart_cookie'))->where('status', 1)->get();
        $countries = Country::select('id', 'name')->get();
        return view('frontend\checkout', [
            'categories' => $categories,
            'countries' => $countries,
            'cart_products' => $cart_products,
            'discount_from_cart' => $discount,
            'coupon' => $coupon,
        ]);
    }
    public function getcitylist(Request $request, $coupon_code = '')
    {

        $cities = City::where('country_id', $request->country_id)->get();
        $str_to_send = '<option value="">-Select Your City- </option>';

        foreach ($cities as $city) {
            $str_to_send .= "<option value='$city->id'>$city->name</option>'";
        }
        echo $str_to_send;
    }
    public function order(OrderRequest $request)
    {
        
        
        $order_id =  Order::insertGetId([
            'user_id' => Auth::id(),
            'discount' => $request->discount,
            'sub_total' => $request->subtotal,
            'amount' => $request->total,
            'payment_method' => 1,
            'created_at' => Carbon::now(),
        ]);

        Order_Billing_details::insert([
            'user_id' => Auth::id(),
            'order_id' => $order_id,
            'phone' => $request->phone,
            'zip' => $request->zip,
            'country_id' => $request->country_id,
            'city_id' => $request->city_id,
            'address' => $request->address,
            'notes' => $request->notes,
            'created_at' => Carbon::now(),
        ]);

        $cart_products = Cart::where('random_generated_id', Cookie::get('cart_cookie'))->where('status', 1)->get();
        foreach ($cart_products as $cart_product) {
            $product_name = Product::find($cart_product->product_id)->product_name;
            $product_price = Product::find($cart_product->product_id)->product_price;
            Order_Product_Details::insert([
                'user_id' => Auth::id(),
                'order_id' => $order_id,
                'product_id' => $cart_product->product_id,
                'product_name' => $product_name,
                'product_price' => $product_price,
                'product_quantity' => $cart_product->product_quantity,
                'created_at' => Carbon::now(),
            ]);
            Cart::where('random_generated_id', Cookie::get('cart_cookie'))->where('status', 1)->delete();
            Product::where('id', $cart_product->product_id)->decrement('quantity', $cart_product->product_quantity);
        }
        return redirect('/order/success');
    } 

}
