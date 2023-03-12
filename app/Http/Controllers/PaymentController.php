<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Http\Request;
use DB;
use Session;
use Stripe;
class PaymentController extends Controller
{
    public function donateNow($id=null)
    {

        return view('user_payment_info',compact('id'));
    }
    public function saveDonation(Request $request)
    {
       // dd($request->input());
       if($request->extra_pound == '1')
       $amount = $request->amount+1;
       else
       $amount = $request->amount;
        $data = [
            'donation_method'=>$request->donation_method,
            'amount'=>$amount,
            'extra_pound'=>$request->extra_pound,
            'gift_aid'=>$request->gift_aid,
            'c_and_m'=>$request->c_and_m,
            'terms'=>$request->terms,
            'anonymous'=>$request->anonymous,
            'donated_to_id'=>$request->donated_to_id,
            'donator_id'=>$request->donator_id,

        ];
        $paymeny_id = DB::table('payment_info')->insertGetId($data);

        return view('checkout',compact('paymeny_id','amount'));
    }

    public function stripePost(Request $request)

    {
//dd($request->input());
if(isset($request->pund_50))
$other_amount = $request->pund_50;
elseif(isset($request->pund_150))
$other_amount = $request->pund_150;
else
$other_amount = $request->pund_250;

if($request->gift_aid == "1")
$amount = $request->total_amount_data+$request->gift_aid;
else
$amount = $request->total_amount_data;

$data = [
    'type'=>$request->single ?? $request->monthly,
    'other_amount'=>$other_amount,
    'title'=> $request->title,
    'f_name'=> $request->first_name,
    'last_name'=> $request->last_name,
    'address1'=> $request->address1,
    'address2'=> $request->address2,
    'address3'=> $request->address3,
    'town_city'=> $request->town,
    'country_state'=> $request->country,
    'email'=> $request->email,
    'phone'=> $request->phone,
    'gift_aid'=> $request->gift_aid,
    'total_amount'=> $amount
];
DB::table('payment_detail')->insert($data);
//dd(100 * 100);
        Stripe\Stripe::setApiKey(env('STRIPE_SECRET'));

        Stripe\Charge::create ([

                "amount" => $amount * 100,

                "currency" => "gbp",

                "source" => $request->stripeToken,

                "description" => "Test payment from sportsme.com"

        ]);



        Session::flash('success', 'Payment successful!');
        return view('thanku');

    }
}
