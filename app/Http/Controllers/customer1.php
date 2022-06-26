<?php

namespace App\Http\Controllers;

use App\add_user_car;
use App\order_model;
use App\provider_data;
use App\transactions_history;
use App\user_cards;
use http\Env\Response;
use Illuminate\Http\Request;
use App\customer;
use Illuminate\Support\Facades\Validator;
use Twilio\Rest\Client;
use Illuminate\Support\Str;

class customer1 extends Controller
{

    function change_name(Request $request){

        $user_id = customer::where('phone', $request->phone)->first();

            if($user_id) {
                $user_id->name = $request->name;

                $user_id->save();
                return "name changed";

            }
            else{
                return "user not found";

            }


    }


    function verfiy_otp(Request $request){
        $retval='';
        $user_id = customer::where('phone', $request->phone)->first();
        if ($request->otp == $user_id->otp &&$request->otp != 0 && $user_id->otp != 0){


            if($user_id) {
                $user_id->otp = '0';
                $user_id->verifyed = 'true';
                $user_id->device_token=$request->device_token;
                $user_id->save();
            }
            $retval=response()-> json([
                'massage'=>'verfied',
            'data'=>$user_id
]
            );
            return $retval;

        }

        else{

            $retval=response()-> json([
                    'massage'=>'Wrong otp',

                ]
            );
            return $retval;
        }
    }


 private function  send_otp(Request $request,$otp){

    $sid = "AC8c9c14a5e759d4f2c334c5db8e47f100"; // Your Account SID from www.twilio.com/console
    $token = "185eb72ee597fc68f0c92f427afc9d32"; // Your Auth Token from www.twilio.com/console

    $client = new Client($sid, $token);
    $message = $client->messages->create(
        '+'.$request->phone, // Text this number
        [
            'from' => '+12762849947', // From a valid Twilio number
            'body' => 'Hello your otp code is '.$otp.' !'
        ]
    );



    return 'otp has been sent';
}



function register_user(Request $request,$otp)
{

    $validator = Validator::make($request->all(), [
        'phone' => 'required|regex:/(201)[0-9]{9}/|size:12'
    ]);


    if ($validator->fails()) {
        return 'invalid number';


    } else {
        $data = customer::Create([

            'name' => "",
            'phone' => $request->phone,
            'token' => Str::random(50),
            'otp' => $otp,
            'verifyed' => 'false'
        ]);
        if ($data) {
            return "true";
        }
        else return "false";
    }



}

function session(Request $request)
{
    $user_id = customer::where([['id', '=', $request->id], ['token', '=', $request->token]])->first();
    if ($user_id) {
        $user_id->device_token=$request->device_token;
        $user_id->save();
        $hasOrder = order_model::where([['user_id', '=', $request->id],
            ['state', '=', 'in progress']])->orWhere([['user_id', '=', $request->id],
            ['state', '=', 'wait for paying']])->first();
        if ($hasOrder) {
            return 'login/request_order';

        } else {
            $searching = order_model::where([['user_id', '=', $request->id], ['state', '=', 'searching for technician']])->first();
            if ($searching) {
                return 'login/searching for technician-'.$searching->id;

            } else {
                return 'login';
            }

        }
    } else {
        return 'logout';

    }


}

    function register(Request $request){

        $otp = random_int(10000, 99999);
        $user_id = customer::where('phone', $request->phone)->first();
        if (!$user_id){
            if($this->register_user($request,$otp)=="true"){

               return $this->send_otp($request,$otp);


            }
            else if ($this->register_user($request,$otp)=="invalid number")
            {
                return 'this number is invalid';
            }

            else return "connection error";


        }
       else if ($request->phone == $user_id->phone) {
           if ($user_id->name == ""|| $user_id->name == null) {
               $user_id->otp = $otp;
               $user_id->save();
               $this->send_otp($request, $otp);
               return "registertion not completed";
           }
           else {

           $user_id->otp = $otp;
           $user_id->save();
           $this->send_otp($request, $otp);

           return "registered before";}
       }




        else{
            if($this->register_user($request,$otp)){

                return $this->send_otp($request,$otp);
            }
                else return "connection error";

        }

    }


       function register_card(Request $request){
           $update_card_data=user_cards::where('mask_pan',$request->masked_pan);
           foreach ($update_card_data as $card_data){
               $card_data->token=$request->token;
               $card_data->save();
           }
        $is_user_used=user_cards::where(['mask_pan','=',$request->masked_pan],['user_id','=',$request->id])->first();
        if(!$is_user_used=== null){
           $data = user_cards::Create([

               'user_id' => $request->id,
               'token' => $request->token,
               'mask_pan' => $request->masked_pan,
               'type' => $request->type,



           ]);


            }


           return 'card has been added';


}

    function get_user_cards(Request $request){

        $data = user_cards::where('user_id',$request->id)->get();
        if ($data->isEmpty()){


            return 'Empty';


        }
        else{

            return $data;
        }


    }
    function getcard_data(Request $request){

        $data = user_cards::where('id',$request->card_id)->first();
        if ($data){



            return $data;


        }else{

            return 'Empty';
        }


    }
    function get_orders(Request $request){

        $orders = order_model::where('user_id',$request->id)->get();
        if ($orders){
        foreach ($orders as $order){
            $car=add_user_car::where('id',$order->car_id)->first();
            if ($car) {

                $order->car_id=$car->brand." ".$car->model;

            }
        }
            return $orders;

        }else{

            return 'Empty';
        }


    }


    function gettoken(Request $request){
        $data = customer::where('id',$request->id)->first();
        if ($data){

            $data->device_token=$request->token;

            $data->save();

            return "done";
        }
        else "error";

    }


    function get_transactions(Request $request){
        $data = transactions_history::where('user_id',$request->id)->get();
        if ($data){

                return $data;
        }
        else {
            "Empty";
        }
    }

    function get_current_balance(Request $request){
        $data = customer::where('id',$request->id)->first();
        if ($data){

            return $data->wallet;
        }
        else {
            "not_found";
        }
    }

    function get_tech_locations(Request $request){
        $data = provider_data::all();
        if ($data){

            return $data;
        }
        else {
            "Empty";
        }
    }

    function delete_card(Request $request){
        $data = user_cards::where('id',$request->id)->delete();
        if ($data){

            return "deleted";
        }
        else {
            "error";
        }
    }

    function delete_car(Request $request){
        $data = add_user_car::where('id',$request->id)->first();
        if ($data){
                $data->state="removed";
                $data->save();
            return "deleted";
        }
        else {
            "error";
        }
    }
}
