<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Order_Billing_details;
use App\Models\Cart;
use App\Models\Category;
use App\Models\Country;
use App\Models\Order_Product_Details;
use App\Models\Product;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Stripe;


class StripePaymentController extends Controller
{   
    public function payonline($order_id)
    {
        $categories = Category::all();
        $order_products = Order::where('id', $order_id)->first();
        $countries = Country::select('id', 'name')->get();
        return view('pay-online', [
            'categories' => $categories,
            'countries' => $countries,
            'order_products' => $order_products,
            'order_id' => $order_id,
        ]);
    }

    public function stripePost(Request $request)
    {
        
        Stripe\Stripe::setApiKey(env('STRIPE_SECRET'));
        $charge = Stripe\Charge::create([
            "amount" => $request->amount * 100,
            "currency" => "usd",
            "source" => $request->stripeToken,
            "description" => "Order_id : " . $request->order_id,
        ]);

        if ($charge['status'] == 'succeeded') 
        {
            Order::where('id', $request->order_id)->update([
                'currency' => 'USD',
                'status' => 'Processing',
                'transaction_id' => $charge['id'],
            ]);
            return redirect('/order/success');
        } 

        else 
        {
            return back()->with('error', 'Something is missing');
        }
    }
}
