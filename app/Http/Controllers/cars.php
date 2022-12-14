<?php

namespace App\Http\Controllers;

use App\add_user_car;
use App\brand_type;
use App\brand_type_model;
use App\customer;
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

        $user_id = customer::where([['id', '=', $request->id], ['token', '=', $request->token]])->first();
        if ($user_id){


                return 'login';


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

    function getcar_data(Request $request){
        $current_version='1.0';
        if ($request->version==$current_version){

            return response()->json([
                'version' => 'already_downloaded' ]);
        }
        else
        {
        $types=brand_type::Select('type')->groupBy('type')->get();
        $finalreturn=array();
        $brands_models=array();
        foreach ($types as $type ){
            $brands=brand_type::Select('brand')->where('type',$type->type)->get();

            foreach ($brands as $brand){
                $models=brand_type_model::Select('model')->where([['type', '=', $type->type],['brand','=',$brand->brand]])->get();

              $brands_models[]=['brand'=>$brand->brand,
                'models'=>$models];
            }
            $finalreturn[]=['type'=>$type->type,
                'brands'=>$brands_models];
            $brands_models=[];

        }
return response()->json([
        'version' => $current_version,
        'data' => $finalreturn]);
        }
    }


function addusercar(Request $request){

if ($this->session($request)=='login'){

    $data=add_user_car::create([
       'user_id'=>$request->id,
        'type'=>$request->type,
        'brand'=>$request->brand,
        'model'=>$request->model,
        'year'=>$request->year,
        'color'=>$request->color,
        'state'=>'active'


    ]);

    return $data;

}

else if($this->session($request)=='logout'){
    return 'logout';
}


}


function getusercars(Request $request){
    if ($this->session($request)=='login'){

        $data=add_user_car::where([['user_id','=',$request->id]
        ,['state','=','active']])->get();


            return $data;

    }

    else if($this->session($request)=='logout'){
        return 'logout';
    }


}
}
