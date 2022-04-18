<?php

namespace App\Http\Controllers;

use http\Env\Response;
use Illuminate\Contracts\Validation\Validator;
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
        $retval='';
        $user_id = customer::where('phone', $request->phone)->first();
        if ($request->otp == $user_id->otp &&$request->otp != 0 && $user_id->otp != 0){


            if($user_id) {
                $user_id->otp = '0';
                $user_id->verifyed = 'true';

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
function register_user(Request $request,$otp){

    $validator = Validator::make($request->all(), [
        'phone'=>'required|regex:/(201)[0-9]{9}/|size:12'
    ]);



       if ($validator->fails()){
            return 'true';
        /*    $data= customer::Create([
            'name'=> "",
            'phone'=> $request->phone,
            'token'=> Str::random(50),
            'otp' =>$otp,
            'verifyed'=>'false'
        ]);*/
        /*    if ($data){
                return true;
            }
            else return false;*/

        }
       else{
           return 'false';
       }



}

function session(Request $request){
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

    function register(Request $request){

        $otp = random_int(10000, 99999);
        $user_id = customer::where('phone', $request->phone)->first();
        if (!$user_id){
            if($this->register_user($request,$otp)=='false'){

              //  return $this->send_otp($request,$otp);

                return $this->register_user($request,$otp);
            }
            else if ($this->register_user($request,$otp)=='true')
            {
                return 'this number is invalid';
            }


        }
       else if ($request->phone == $user_id->phone) {
           if ($user_id->name == ""|| $user_id->name == null) {
               $user_id->otp = $otp;
               $user_id->save();
            //   $this->send_otp($request, $otp);
               return "registertion not completed";
           }
           else {

           $user_id->otp = $otp;
           $user_id->save();
         //  $this->send_otp($request, $otp);

           return "registered before";}
       }




        else{
            if($this->register_user($request,$otp)){

                return $this->send_otp($request,$otp);
            }
                else return "connection error";

        }

    }




}
