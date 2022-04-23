<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class payment extends Controller
{
    function payment(Request $request){
            $token=$this->gettoken();
            $order=$this->createOrder($token,$request);
        $paymentToken = $this->getPaymentToken($order, $token,$request);
            return $paymentToken;
    }


    function gettoken(){
        $response=HTTP::post('https://accept.paymob.com/api/auth/tokens',
        [
            'api_key'=>'ZXlKaGJHY2lPaUpJVXpVeE1pSXNJblI1Y0NJNklrcFhWQ0o5LmV5SmpiR0Z6Y3lJNklrMWxjbU5vWVc1MElpd2ljSEp2Wm1sc1pWOXdheUk2TVRjd016ZzNMQ0p1WVcxbElqb2lhVzVwZEdsaGJDSjkudWRsam1TV0RaQnVjVFk0OE5sbDNyRGg2TXdvQWtjeEtXeGRpWU5Rb1hXaUU3SjJxLWVPSFJramxkWmc3clhyTlNaWUxJX2dXYTlGRVhYRGROeGZuWEE='
        ]);

return $response->object()->token;
    }

    function createordedr($token,$request){

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
            "apartment" => "803",
            "email" => "mardoamster200@gmail.com",
            "floor" => "7",
            "first_name" => "Clifford",
            "street" => "Ethan Land",
            "building" => "8028",
            "phone_number" => "+201211509014",
            "shipping_method" => "PKG",
            "postal_code" => "01898",
            "city" => "Jaskolskiburgh",
            "country" => "CR",
            "last_name" => "Nicolas",
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

}
