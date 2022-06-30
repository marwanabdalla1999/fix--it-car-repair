<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class payment extends Controller
{
    function payment(Request $request){
            $token=$this->gettoken();
            $order=$this->createOrder($token,$request);
        $paymentToken = $this->getPaymentToken($order, $token,$request);
            return $paymentToken;
    }




    function createOrder($token,$request){

        $items = [
        ];

        $data = [
            "auth_token" =>   $token,
            "delivery_needed" =>"false",
            "amount_cents"=> $request->amount,
            "currency"=> "EGP",
            "items"=> $items,

        ];
        $response = Http::post('https://accept.paymob.com/api/ecommerce/orders', $data);
        return $response->object();
    }

    public function getPaymentToken($order, $token,$request)
    {
        $billingData = [
            "apartment" => "705",
            "email" => "marwanabdalla1999@gmail.com",
            "floor" => "7",
            "first_name" => "marwan",
            "street" => "ELAmer Gamel",
            "building" => "24",
            "phone_number" => "+201011218307",
            "shipping_method" => "PKG",
            "postal_code" => "21532",
            "city" => "Alexandria",
            "country" => "EG",
            "last_name" => "Abdalla",
            "state" => "Utah"
        ];
        $data = [
            "auth_token" => $token,
            "amount_cents" => $request->amount,
            "expiration" => 3600,
            "order_id" => $order->id,
            "billing_data" => $billingData,
            "currency" => "EGP",
            "integration_id" => '2008977'
        ];
        $response = Http::post('https://accept.paymob.com/api/acceptance/payment_keys', $data);
        return $response->object()->token;
    }
    function gettoken(){
        $response=HTTP::post('https://accept.paymob.com/api/auth/tokens',
            [
                'api_key'=>'ZXlKaGJHY2lPaUpJVXpVeE1pSXNJblI1Y0NJNklrcFhWQ0o5LmV5SmpiR0Z6Y3lJNklrMWxjbU5vWVc1MElpd2ljSEp2Wm1sc1pWOXdheUk2TVRjd016ZzNMQ0p1WVcxbElqb2lhVzVwZEdsaGJDSjkudWRsam1TV0RaQnVjVFk0OE5sbDNyRGg2TXdvQWtjeEtXeGRpWU5Rb1hXaUU3SjJxLWVPSFJramxkWmc3clhyTlNaWUxJX2dXYTlGRVhYRGROeGZuWEE='
            ]);

        return $response->object()->token;
    }
}
