<?php

namespace App\Http\Controllers;

use App\provider_data;
use App\provider_login;
use http\Env\Response;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use phpDocumentor\Reflection\Utils;

class technican extends Controller
{
    function add_new_provider(Request $request){
   $data2=new provider_data();

        if($request->hasFile('photo')){
            $file= $request->file('photo');
            $filename= date('YmdHi').$file->getClientOriginalName();
            $file-> move(public_path('public/photo'), $filename);
            $data2['photo']= $filename;

        }
      //  $data2->save();
        $data1 = provider_login::Create([

            'password' => $request->password,
            'token' => Str::random(50),
            'username' => $request->username]);


        $data = provider_data::Create([

            'name' => $request->name,
            'phone' => $request->phone,
            'provider_id' => $data1->id,
            'photo' => $this->image($data2['photo'])

        ]);

       $response= response()-> json([
                'id'=>$data->provider_id,
               'name'=>$data->name,
               'photo'=>$data->photo,
               'token'=>$data1->token,
               'phone'=>$data->phone,
               'rate' => $data->rate


           ]
        );


        return $response;
    }

    public function image($fileName){
        $path = 'https://fix--it-car-repair.herokuapp.com/public/photo/'.$fileName;
        return $path;
    }

    function provider_login(Request $request){
        $tech_id = provider_login::where('username',$request->username)->first();

        if ($tech_id) {
            if ($tech_id->password == $request->password) {

            $tech_data = provider_data::where('provider_id', $tech_id->id)->first();
            $response = response()->json([
                    'id' => $tech_id->id,
                    'name' => $tech_data->name,
                    'photo' => $tech_data->photo,
                    'token' => $tech_id->token,
                    'phone' => $tech_data->phone,
                    'specialized at' => $tech_data->specialized_at,
                    'rate' => $tech_data->rate

                ]
            );
            return $response;
        }

        }

    }
    function session(Request $request){
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


}
