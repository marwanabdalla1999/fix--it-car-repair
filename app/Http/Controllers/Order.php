<?php

namespace App\Http\Controllers;

use App\customer;
use App\provider_login;
use App\requests;
use App\tech_offer;
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

           requests::Create([
               'user_id' => $data->user_id,
               'order_id' => $data->id,
               'issue'=>$request->issue

           ]);

       return $data;
       }
       else{
           return 'logout';

       }

    }


    function technican_offer(Request $request){
        $response= $this->session($request);
        if ($response=='login'){
            $data = order_model::Create([

                'user_id' => $request->user_id,
                'technican_id' => $request->technican_id,
                'amount' => $request->amount,
                'time' =>$request->time,

            ]);
            return $data;
        }
        else{
            return 'logout';

        }

    }

    function getoffers(Request $request){
     //   $response= $this->session($request);

    //    if ($response=='login'){

            $offers=tech_offer::where('order_id',$request->order_id)->orderBy('id')->get();
                if ($offers!=null){
            return $offers;
                //}

             //   else{

                    return 'Empty';
         //       }
        }
        else{
            return 'logout';

        }

    }

    function getrequests(Request $request){
           $response= $this->session_provider($request);
         $requests="";
            if ($response=='login'){
               $data=getDataAttribute($request);
                $requests=requests::where('issue',$request->issue)->get();
                foreach(data as $fields)
                {





                }
        if ($requests!=null){
            return $requests;
            }

               else{

            return 'Empty';
                  }
        }
        else{
            return 'logout';
        }

    }
    function session_provider(Request $request){
        $user_id = provider_login::where('id', $request->id)->first();
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

    public function getDataAttribute($request)
    {
        return explode(',', $request->issue);
    }
}
