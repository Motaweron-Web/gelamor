<?php

namespace App\Services;

use Omnipay\Common\CreditCard;
use Omnipay\Omnipay;

class PaymentService
{
    public function pay($request){
        // Create a gateway for the Mpgs Gateway
// (routes to GatewayFactory::create)
        /* @var \Omnipay\Mpgs\Gateway $gateway */
//        $gateway = Omnipay::create('Mpgs');
//
//        $gateway->setTestMode(true);
//        $gateway->setEndpointBase('https://www.bassgool.com');
//        $gateway->setMerchantId('merchantIdValue');
//        $gateway->setPassword('passwordValue');
//
//
////        // Charge using a card
////        /* @var \Omnipay\Mpgs\Message\PurchaseResponse $response */
//
//        $response = $gateway->purchase([
//            'card' => new CreditCard([
//                'number' => '4277784143478268',
//                'cvv' => '188',
//                'expiryMonth' => '06',
//                'expiryYear' => '2027',
//                'firstName' => 'Jos',
//                'lastName' => 'Mullen',
//            ]),
//            'amount' => '1.00',
//            'currency' => 'EGP',
////            'returnUrl' => 'http://bobjones.com/payment/return',
////            'cancelUrl' => 'http://bobjones.com/payment/cancel',
////            'transactionId' => "120170529082422",
//            'description' => 'Merchant Reference',
//        ])->send();
//        dd($response->getMessage());


//        $stripe = new \Stripe\StripeClient("sk_test_51M6Dk1Hb7WBZjgxww7ZAnwowo41o2BZitIhlDe7ZcBfuUrMYOyY8xKLo3zp4iPExdokk3R4cjvVVwKFLC6vRg2zn002Hs2d5mL");
//        $charge = $stripe->charges->create([
//            'amount' => 2000,
//            'currency' => 'usd',
//            'source' => 'tok_mastercard', // obtained with Stripe.js
//            'description' => 'My First Test Charge (created for API docs at https://www.stripe.com/docs/api)',
//              "metadata" => ["order_id" => "6735"]
//        ]);
        $stripe = new \Stripe\StripeClient(
            'sk_test_51M6Dk1Hb7WBZjgxww7ZAnwowo41o2BZitIhlDe7ZcBfuUrMYOyY8xKLo3zp4iPExdokk3R4cjvVVwKFLC6vRg2zn002Hs2d5mL'
        );
        $stripe->payouts->create([
            'amount' => 1100,
            'currency' => 'EGP',
        ]);
        dd($stripe->getMessage());

    }

}
