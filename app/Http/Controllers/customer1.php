<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\customer;
use Twilio\Rest\Client;
use Illuminate\Support\Str;

class customer1 extends Controller
{


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


    function register(Request $request){
        // Send an SMS using Twilio's REST API and PHP
        $sid = "AC8c9c14a5e759d4f2c334c5db8e47f100"; // Your Account SID from www.twilio.com/console
        $token = "185eb72ee597fc68f0c92f427afc9d32"; // Your Auth Token from www.twilio.com/console
        $otp = random_int(100000, 999999);

        $user_id = customer::where('phone', $request->phone)->first();
        if ($request->phone == $user_id->phone){



            return 'this number is used before';
        }
        else{
        $client = new Client($sid, $token);
        $message = $client->messages->create(
            '+'.$request->phone, // Text this number
            [
                'from' => '+12762849947', // From a valid Twilio number
                'body' => 'Hello your otp code is '.$otp.' !'
            ]
        );

        $data= customer::Create([
            'name'=> $request->name,
                'phone'=> $request->phone,
                'token'=> Str::random(50),
                'otp' =>$otp,
                'verifyed'=>'false'
                ]);

        return 'otp has been sent';
        }

    }



    function getusers(){
        $users=customer::all();

        return $users;
    }
}
