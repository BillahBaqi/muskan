<?php

namespace App\Http\Controllers;

use App\Mail\SendInvoice;
use App\Models\Order;
use App\Models\Category;
use App\Models\Country;
use App\Models\Order_Billing_details;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
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

            //invoice mail
            $invoice_details = Order::find($request->order_id);
            $user_email = User::find(Order::where('id', $request->order_id)->first()->user_id)->email;
            Mail::to($user_email)->send(new SendInvoice($invoice_details));
            
            //invoice sms
            $url = "http://66.45.237.70/api.php";
            $number = Order_Billing_details::where('order_id', $request->order_id)->first()->phone;
            $text = "Thanks for your order. Id: #" . str_pad($request->order_id, 5, '0', STR_PAD_LEFT) . '. Total:' . $request->amount;
            $data = array(
                'username' => "billahbaqi",
                'password' => "MYWX4H3C",
                'number' => "$number",
                'message' => "$text"
            );

            $ch = curl_init(); // Initialize cURL
            curl_setopt($ch, CURLOPT_URL, $url);
            curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($data));
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
            $smsresult = curl_exec($ch);
            $p = explode("|", $smsresult);
            $sendstatus = $p[0];
            return redirect('/order/success');
        } 

        else 
        {
            return back()->with('error', 'Something is missing');
        }
    }
}
