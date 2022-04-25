<?php

namespace App\Http\Controllers;

use App\customer;
use Illuminate\Http\Request;
use App\order_model;

class Order extends Controller
{function session(Request $request){
    $user_id = customer::where('id', $request->id)->first();
    if ($user_id){
        if ($user_id->token==$request->token){


            return 'login';
        }
        else{
            return 'logout';

        }
    }
    else{

        return 'logout';
    }




}
    function create(Request $request){
      $response= $this->session($request);
       if ($response=='login'){
        $data = Order::Create([
            'location_lat_lng' => $request->location_lat_lng,
            'user_id' => $request->user_id,
            'car_id' => $request->car_id,
            'address' =>$request->address ,
            'payment_way' => $request->payment_way
        ]);
       return $data;
       }
       else{
           return 'logout';

       }

    }
}