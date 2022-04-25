<?php

namespace App\Http\Controllers;

use App\customer;
use Illuminate\Http\Request;
use App\order_model;

class Order extends Controller
{function session(Request $request){
    $user_id = customer::where('id', $request->user_id)->first();
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
        $data = order_model::Create([
            'location_lat_lng' => $request->location_lat_lng,
            'user_id' => $request->user_id,
            'car_id' => $request->car_id,
            'address' =>$request->address ,
            'issue' =>$request->issue,
            'payment_way' => $request->payment_way
        ]);
       return $data;
       }
       else{
           return 'logout';

       }

    }
}
