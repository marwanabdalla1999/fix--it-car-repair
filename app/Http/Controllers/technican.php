<?php

namespace App\Http\Controllers;

use App\brand_type;
use App\brand_type_model;
use App\order_model;
use App\provider_data;
use App\provider_login;
use App\requests;
use http\Env\Response;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use phpDocumentor\Reflection\Utils;
use Google\Cloud\Storage;
class technican extends Controller
{
    function add_new_provider(Request $request){
   $data2=new provider_data();
        $image = $request->file('photo'); //image file from frontend
        $firebase_storage_path = 'provider_photo/';
        $name     = $request->phone;
        $localfolder = public_path('firebase-temp-uploads') .'/';
        $extension = $image->getClientOriginalExtension();
        $file      = $name. '.' . $extension;
        if ($image->move($localfolder, $file)) {
            $uploadedfile = fopen($localfolder.$file, 'r');
            app('firebase.storage')->getBucket()->upload($uploadedfile, ['name' => $firebase_storage_path . $name]);
            //will remove from local laravel folder
            unlink($localfolder . $file);
        }
    /*    if($request->hasFile('photo')){
            $file= $request->file('photo');
            $filename= date('YmdHi').$file->getClientOriginalName();
            $file-> move(public_path('/temp/photos'), $filename);
            $data2['photo']= $filename;

        }*/
        $data1 = provider_login::Create([

            'password' => $request->password,
            'token' => Str::random(50),
            'username' => $request->username]);


        $data = provider_data::Create([

            'name' => $request->name,
            'phone' => $request->phone,
            'provider_id' => $data1->id,
            'specialized_in' =>$request->specialized,
          //  'photo' => $this->image($data2['photo'])

        ]);

       $response= response()-> json([
                'id'=>$data->provider_id,
               'name'=>$data->name,
               'photo'=>$data->photo,
               'token'=>$data1->token,
               'phone'=>$data->phone,
               'specialized_in' => $request->specialized,
               'rate' => $data->rate


           ]
        );


        return $response;
    }

    public function image($fileName){

        $path = 'https://fix--it-car-repair.herokuapp.com/temp/photos/'.$fileName;
        return $path;

    }

    function provider_login(Request $request){
        $tech_id = provider_login::where([['username','=',$request->username],['password','=',$request->password]])->first();

        if ($tech_id) {
            $tech_data = provider_data::where('provider_id', $tech_id->id)->first();
            $response = response()->json([
                    'id' => $tech_id->id,
                    'name' => $tech_data->name,
                    'photo' => $tech_data->photo,
                    'token' => $tech_id->token,
                    'phone' => $tech_data->phone,
                    'specialized_in' => $tech_data->specialized_in,
                    'rate' => $tech_data->rate

                ]
            );
            return $response;


        }
        else{

            return 'invalid username or password';
        }

    }
    function session(Request $request){
        $user_id = provider_login::where('id', $request->id)->first();
        if ($user_id){
            if ($user_id->token==$request->token){
                $hasOrder =order_model::where([['tech_id', '=', $request->id],
                    ['state', '=', 'in progress']])->orWhere([['tech_id', '=', $request->id],
                    ['state', '=', 'wait_for_paying']])->first();
                if ($hasOrder){

                    return 'login/provide_order';
                }
else{
                return 'login';}
            }
            else{
                return 'logout';

            }
        }
        else{

            return 'logout';
        }




    }

    function cardata(Request $request){
        $data5=new brand_type();

        $test=brand_type::where([
            ['type','=', $request->type],
            ['brand', '=', $request->brand]])->first();
        if ($test){
            $data1 = brand_type_model::Create([
                'type' => $request->type,
                'model' => $request->model,
                'brand' => $request->brand
            ]);

            return $data1;
     }
        else {
            if ($request->hasFile('photo1')) {
                $file = $request->file('photo1');
                $filename = date('YmdHi') . $file->getClientOriginalName();
                $file->move(public_path('public/photo'), $filename);
                $data5['photo'] = $filename;


                $path = 'https://fix--it-car-repair.herokuapp.com/public/photo/' . $data5['photo'];

                $data = brand_type::Create([
                    'type' => $request->type,
                    'brand' => $request->brand,
                    'photo' => $path

                ]);
                $data1 = brand_type_model::Create([
                    'type' => $request->type,
                    'model' => $request->model,
                    'brand' => $request->brand
                ]);
                return $data;

            } else {

                return 'error';
            }


        }

    }



}
