<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Hash;
use Session;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Stripe;
use Illuminate\Support\Facades\App;
use Config;

class CustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        if(Auth::check()){
            
            $user = Auth::user();
            //Based on user type redirect to different dashboard
            if($user->type == 2){
                $stripe_key = Config::get('services.stripe');
                $key = $stripe_key['key'];
                return view('customer.account', compact('key'));
            }
        }
  
        return redirect("login")->withSuccess('You are not allowed to access');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
    
    public function stripePost(Request $request)
    {
        $amount = $request->amount;
        $email = $request->email;
        $name  = $request->name;
        $phone  = $request->phone;
        $stripe_key = Config::get('services.stripe');
        Stripe\Stripe::setApiKey($stripe_key['secret']);
      
        $payment = Stripe\Charge::create ([
                "amount" => $amount * 100,
                "currency" => "nzd",
                "source" => $request->stripeToken,
                "description" => "Transporter Topup", 
                
        ]);
        echo '<pre>';
        print_r($payment);
        echo '<pre>';
        //return redirect()->route('customer.account')->withSuccess('Payment successful!');
        //return redirect("/customer/account")->withSuccess('Payment successful!');        
    }
    

}
