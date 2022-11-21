<?php

namespace App\Services;

use Exception;
use Illuminate\Support\Facades\Validator;
use Omnipay\Common\CreditCard;
use Omnipay\Omnipay;
use Stripe\Exception\CardException;
use Stripe\StripeClient;

class PaymentService
{

    // link web https://www.ultimateakash.com/blog-details/IixTJGAKYAo=/How-to-Integrate-Stripe-Payment-Gateway-In-Laravel-2022
    private $stripe;
    public function __construct()
    {
        $this->stripe = new StripeClient(config('stripe.api_keys.secret_key'));
    }


    public function pay($request)
    {
        $validator = Validator::make($request->all(), [
            'fullName' => 'required',
            'cardNumber' => 'required',
            'month' => 'required',
            'year' => 'required:',
            'cvv' => 'required'
        ]);

        if ($validator->fails()) {
            $request->session()->flash('danger', $validator->errors()->first());
            return response()->json(["data"=>'',"errors"=>$validator->errors()->first()],422);
        }

        $token = $this->createToken($request);
        if (!empty($token['error'])) {
            return response()->json(["data"=>'',"errors"=>['error'=>$token['error']],'message'=>"Payment failed."],422);
        }
        if (empty($token['id'])) {
            return response()->json(["data"=>'',"errors"=>[],'message'=>"Payment failed."],409);
        }

        $charge = $this->createCharge($token['id'], $request->amount);
        if (!empty($charge) && $charge['status'] == 'succeeded') {
            return response()->json(["data"=>'',"errors"=>[],'message'=>"Payment Successfully."],200);
        } else {
            return response()->json(["data"=>'',"errors"=>[],'message'=>"Payment failed."],406);
        }
        return response()->json(["data"=>''],200);
    }

    private function createToken($cardData)
    {
        $token = null;
        try {
            $token = $this->stripe->tokens->create([
                'card' => [
                    'number' => $cardData['cardNumber'],
                    'exp_month' => $cardData['month'],
                    'exp_year' => $cardData['year'],
                    'cvc' => $cardData['cvv']
                ]
            ]);
        } catch (CardException $e) {
//            dd($e->getError()->message);
//            return response()->json(["data"=>'',"errors"=>[],'message'=> $e->getError()->message],422);
            $token['error'] = $e->getError()->message;
        } catch (Exception $e) {
//            return response()->json(["data"=>'',"errors"=>[],'message'=>$e->getMessage()],422);
            $token['error'] = $e->getMessage();
        }
        return $token;
    }

    private function createCharge($tokenId, $amount)
    {
        $charge = null;
        try {
            $charge = $this->stripe->charges->create([
                'amount' => $amount,
                'currency' => 'usd',
                'source' => $tokenId,
                'description' => 'My first payment'
            ]);
        } catch (Exception $e) {
            $charge['error'] = $e->getMessage();
        }
        return $charge;
    }

}
