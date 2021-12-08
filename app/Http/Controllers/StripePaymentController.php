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
use Exception;
use Illuminate\Support\Facades\Redirect;
use Stripe;

class StripePaymentController extends Controller
{
    
    public function stripePost(Request $request)
    {
        try {
            Stripe\Stripe::setApiKey(env('STRIPE_SECRET'));
            $charge = Stripe\Charge::create([
                "amount" => $request->total * 100,
                "currency" => "usd",
                "source" => $request->stripeToken,
                "description" => "Test payment from baqi.com."
            ]);
            
            if ($charge['paid'] == false) {
                return back()->with('error', 'Something is missing');
            }
            elseif($charge['status'] == 'succeeded')
            {
                $order_id =  Order::insertGetId([
                    'user_id' => $request->user_id,
                    'discount' => $request->discount,
                    'sub_total' => $request->subtotal,
                    'amount' => $request->total,
                    'payment_method' => 3,
                    'currency' => 'USD',
                    'status' => 'Processing',
                    'transaction_id' => $charge['id'],
                    'created_at' => Carbon::now(),
                ]);

                Order_Billing_details::insert([
                    'user_id' => $request->user_id,
                    'order_id' => $order_id,
                    'phone' => $request->c_phone,
                    'zip' => $request->c_zip,
                    'country_id' => $request->c_country_id,
                    'city_id' => $request->c_city_id,
                    'address' => $request->c_address,
                    'notes' => $request->notes,
                    'created_at' => Carbon::now(),
                ]);

                $cart_products = Cart::where('random_generated_id', Cookie::get('cart_cookie'))->where('status', 1)->get();
                foreach ($cart_products as $cart_product) {
                    $product_name = Product::find($cart_product->product_id)->product_name;
                    $product_price = Product::find($cart_product->product_id)->product_price;
                    Order_Product_Details::insert([
                        'user_id' => $request->user_id,
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
            else{

                return back()->with('error', 'Something is missing');

            }

        
        } catch (Exception $e) {
            return back()->with('error', $e->getMessage());

        }
        
       
    }
}
