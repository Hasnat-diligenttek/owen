<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\PaymentInformation;
use Auth;

class PaymentController extends Controller
{
    public function update_paymentinfo(Request $request)
    {

         $request->validate(
           [
            'type' => 'required',
            'card_name' => 'required',
            'card_number' => 'required',
            'exp_date' => 'required'

           ]
        );

        $payment_information = PaymentInformation::where('user_id',Auth::user()->id)->first();


        if(!$payment_information){
            $create = PaymentInformation::create([
                'user_id' => Auth::user()->id,
                'type' => $request->type,
                'card_name' => $request->card_name,
                'card_number' => $request->card_number,
                'exp_date' => $request->exp_date,
            ]);
        }else{
            $update = $payment_information->update([
                'user_id' => Auth::user()->id,
                'type' => $request->type,
                'card_name' => $request->card_name,
                'card_number' => $request->card_number,
                'exp_date' => $request->exp_date,
            ]);
        }


        return back()->with('success','paymentinfo edited successfully');
    }
}
