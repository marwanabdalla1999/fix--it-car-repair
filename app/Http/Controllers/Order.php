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
        $response= $this->session($request);

        if ($response=='login'){

            $offers=tech_offer::where('order_id',$request->order_id)->orderBy('id')->get();
                if ($offers){
            return $offers;
                }

                else{

                    return 'Empty';
                }
        }
        else{
            return 'logout';

        }

    }

    function getrequests(Request $request){
           $response= $this->session_provider($request);
        $requests=[];
            if ($response=='login'){
               $data=$this->getDataAttribute($request);
                foreach($data as $fields)
                {
                    $requests=array_merge($requests, requests::where('issue',$fields)->get()->toArray());




                }

        if ($requests!=null){
            $requests_final=array();

            foreach ($requests as $req){

               $order_data =order_model::where('id',$req['order_id'])->first();

               $temp= response()->json([
                   'id' => $req['id'],
                   'user_id' => $req['user_id'],
                   'order_id' => $req['order_id'],
                   'issue' => $req['issue'],
                   'address' => $order_data->address,
                   'payment_way' => $order_data->payment_way,
                   'location_lat_lng' => $order_data->location_lat_lng]);

                $requests_final[]=$temp;

            }
            return $requests_final;
            }

               else{

            return 'Empty';
                  }
        }
        else{
            return 'logout';
        }

    }
    function send_offer(Request $request){

        $data = tech_offer::Create([

            'user_id' => $request->user_id,
            'amount' => $request->amount,
            'time' => $request->time,
            'order_id' =>$request->order_id,
            'technican_id' =>$request->technican_id,
            'distance' =>$request->distance,


        ]);

                return $data;

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
