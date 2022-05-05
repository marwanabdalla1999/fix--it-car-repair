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
            'payment_way' => $request->payment_way,
           'state'=>'searching for technician'

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
                if ($offers!= null && $offers != "[]"){
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
        $requests=array();
        $finalrequests=[];
        $removed_requests=array();
            if ($response=='login'){
               $data=$this->getDataAttribute($request);
                foreach($data as $fields)
                {
                    $requests=array_merge($requests, order_model::where([
                        ['state','=', 'searching for technician'],
                        ['issue', '=', $fields]])->orderBy('created_at')->get()->toArray());

                }
                foreach($requests as $req)
                {
                    $removed_requests=array_merge($removed_requests, tech_offer::where([
                        ['technican_id','=',$request->id],
                        ['order_id', '=', $req['id']]])->get()->toArray());

                }

                $finalrequests = $this->diff($requests, $removed_requests);

        if ($removed_requests!=null){
            return $removed_requests;


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
        $response= $this->session_provider($request);
        if ($response=='login'){
            $data = tech_offer::Create([

                'user_id' => $request->user_id,
                'amount' => $request->amount,
                'time' => $request->time,
                'order_id' =>$request->order_id,
                'technican_id' =>$request->id,
                'distance' =>$request->distance,


            ]);
            return 'offer has been sent';

        }
        else{
            return 'logout';
        }



    }

    function session_provider(Request $request){
        $tech_id = provider_login::where('id', $request->id)->first();
        if ($tech_id){
            if ($tech_id->token==$request->token){


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


    function cancel_order(Request $request){
        $response= $this->session($request);
        if ($response=='login'){

           $order= order_model::where('id',$request->order_id)->first();
            if ($order!= null){
                $order->state = 'cancelled';

                $order->save();

                return 'cancelled';
            }

            else{

                return 'order not found';
            }
        }
        else{
            return 'logout';

        }

    }

    private function diff(array $requests, array $removed_requests)
    {
                $return_array=array();
        foreach ($requests as $req){
        foreach ($removed_requests as $removed_req){
            $found=false;
            if ($req['id']==$removed_req['order_id']){

                         $found=true;

                    }}
                if (!$found){
                    $return_array[]=$req;

                }





            }

        return $return_array;


    }
}
