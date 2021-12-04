<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Session;
use Auth;

class StripePaymentController extends Controller
{
    /**
     * success response method.
     *
     * @return \Illuminate\Http\Response
     */

    /*     public function stripe()
        {
            return view('stripe');
        } */

    /**
     * success response method.
     *
     * @return \Illuminate\Http\Response
     */
    public function stripePost(Request $request)
    {
        $stripe = Stripe::make('pk_test_51K1d6cK6T4r8QWCDH9lWh1XNvh0neFwaDWnqYMk97Mkll72an4F8CvPoOtqaMvai5srGaQlybiRO1aW5UUl1x7ou00ylsuSmlO');
        
            $token = $stripe->tokens()->create([
                'card' => [
                    'number' => $request->card_number,
                    'exp_month' => $request->month,
                    'exp_year' => $request->year,
                    'cvc' => $request->cvc,
                ],
            ]);
            if (!isset($token['id'])) {
                dd($token['id']);
                // return back()->with('error', 'Please correct the errors and try again.');
            }
          
            

            $charge = $stripe->charges()->create([
            'Customer' => $token['id'],
            'currency' => 'BDT',
            'amount'   => $request->total,
            "description" => "Test payment from baqisoftbd.com.",
            ]);


        

        // Stripe\Charge::create([
        //     "amount" => $request->total * 100,
        //     "currency" => "usd",
        //     "source" => $request->stripeToken,
        //     "description" => "Test payment from baqisoftbd.com."
        // ]);
        
    

    echo $charge['id'];
       
        // return redirect('/order/success');
    }
}
