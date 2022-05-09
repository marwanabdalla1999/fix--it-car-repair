<?php

namespace App\Http\Controllers;

use App\brand_type;
use App\brand_type_model;
use App\provider_data;
use App\provider_login;
use App\requests;
use http\Env\Response;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use phpDocumentor\Reflection\Utils;

class cars extends Controller
{

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

    function getcar_data(){
        $types=brand_type::Select('type')->groupBy('type')->get();
        $finalreturn=[];
        foreach ($types as $type ){
            $models=brand_type::where('type',$type)->get();
            $finalreturn=$models;
        }
return $finalreturn;
    }



}
