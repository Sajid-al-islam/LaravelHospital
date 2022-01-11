<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Stripe\Stripe;
use Stripe\Charge;
use Session;
use App\Models\Service;

class StripeController extends Controller
{
    public function stripe(Service $service)
    {
        return view('frontend.stripe', compact('service'));
    }

    public function stripePost(Request $request)
    {
        Stripe::setApiKey(env('STRIPE_SECRET'));
        Charge::create ([
                "amount" => $request->cost * 100,
                "currency" => "bdt",
                "source" => $request->stripeToken,
                "description" => "This payment is tested purpose phpcodingstuff.com"
        ]);
   
        Session::flash('success', 'Payment successful!');
           
        return back();
    }
}
