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
        if($request->file('image')){
            $file= $request->file('image');
            $filename= date('YmdHi').$file->getClientOriginalName();
            $file-> move(public_path('public/Image'), $filename);
            $data2['image']= $filename;
        }
        $data2->save();
        $data1 = provider_login::Create([

            'password' => "132516",
            'token' => Str::random(50),
            'username' => "dasdasd"]);


        $data = provider_data::Create([

            'name' => "3535sad",
            'phone' => "6531dasd",
            'provider_id' => $data1->id,
            'photo' => $data2['image']

        ]);

      /* $response= response()-> json([
                'id'=>$data->provider_id,
               'name'=>$data->name,
               'photo'=>$data->photo,
               'token'=>$data1->token,
               'phone'=>$data->phone


           ]
        );*/


        return $data;
    }

    public function image($fileName){
        $path = public_path().'/images/provier_photos/'.$fileName;
        return Response::download($path);
    }

    function storeImage(Request $request){



    }
}
