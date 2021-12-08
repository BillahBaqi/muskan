<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Session;
use Stripe;
use Auth;
use Exception;

class StripePaymentController extends Controller
{
    
    public function stripePost(Request $request)
    {
        
        try {
            Stripe\Stripe::setApiKey(env('STRIPE_SECRET'));
            $charge = Stripe\Charge::create([
                "amount" => 100 * 100,
                "currency" => "usd",
                "source" => $request->stripeToken,
                "description" => "Test payment from itsolutionstuff.com."
            ]);
            
            if ($charge['paid'] == true) {
                echo 'success';
            }
            else{
                echo 'fail';
                echo $charge['id'];
            }

        
        } catch (Exception $e) {
            echo 'transection fail';
            
        }
        
        
        // Stripe\Stripe::setApiKey(env('STRIPE_SECRET'));
        // $charge = Stripe\Charge::create([
        //     "amount" => 100 * 100,
        //     "currency" => "usd",
        //     "source" => $request->stripeToken,
        //     "description" => "Test payment from itsolutionstuff.com."
        // ]);
        
            

        //     $charge = $stripe->charges()->create([
        //     'Customer' => $token['id'],
        //     'currency' => 'BDT',
        //     'amount'   => $request->total,
        //     "description" => "Test payment from baqisoftbd.com.",
        //     ]);


        

        // Stripe\Charge::create([
        //     "amount" => $request->total * 100,
        //     "currency" => "usd",
        //     "source" => $request->stripeToken,
        //     "description" => "Test payment from baqisoftbd.com."
        // ]);
        
    

    // echo $charge['id'];
       
        // return redirect('/order/success');
    }
}
