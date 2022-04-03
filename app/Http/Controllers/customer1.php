<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\customer;
use Twilio\Rest\Client;
use Illuminate\Support\Str;

class customer1 extends Controller
{

    function change_name(Request $request){

        $user_id = customer::where('phone', $request->phone)->first();

            if($user_id) {
                $user_id->name = $request->name;

                $user_id->save();
            }

            return "name changed";

    }
    function verfiy_otp(Request $request){
        $user_id = customer::where('phone', $request->phone)->first();
        if ($request->otp == $user_id->otp &&$request->otp != 0 && $user_id->otp != 0){


            if($user_id) {
                $user_id->otp = '0';
                $user_id->verifyed = 'true';

                $user_id->save();
            }
            return $user_id;

        }

        else{

            return "wrong otp";
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
function register_user(Request $request,$otp){

    $data= customer::Create([
        'name'=> "",
        'phone'=> $request->phone,
        'token'=> Str::random(50),
        'otp' =>$otp,
        'verifyed'=>'false'
    ]);
    if ($data){
        return true;
    }
    else return false;

}


    function register(Request $request){

        $otp = random_int(10000, 99999);
        $user_id = customer::where('phone', $request->phone)->first();
        if ($user_id==null){

            if($this->register_user($request,$otp)){

                return $this->send_otp($request,$otp);
            }

            else return "connection error";


        }
       else if ($request->phone == $user_id->phone){
               $user_id->otp = $otp;
               $user_id->save();

           $this->send_otp($request,$otp);

            return "registered before";



        }

        else{
            if($this->register_user($request,$otp)){

                return $this->send_otp($request,$otp);
            }
                else return "connection error";

        }

    }



    function getusers(){
        $users=customer::all();

        return $users;
    }
}
