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
            if ($request->hasFile('photo')){
                $destination='public/images/provier_photos';
                $image=$request->file('photo');
                $image_name=$image->getClientOriginalName();
                $path=$request->file('photo')->storeAs($destination,$image_name);
                    $request['photo']=$image_name;
            }
        $data1 = provider_login::Create([

            'password' => $request->password,
            'token' => Str::random(50),
            'username' => $request->username]);


        $data = provider_data::Create([

            'name' => $request->name,
            'phone' => $request->phone,
            'provider_id' => $data1->id,
            'photo' => $request['photo']

        ]);

       $response= response()-> json([
                'id'=>$data->provider_id,
               'name'=>$data->name,
               'photo'=>$data->photo,
               'token'=>$data1->token,
               'phone'=>$data->phone


           ]
        );


        return $data1;
    }

    public function image($fileName){
        $path = public_path().'/images/provier_photos/'.$fileName;
        return Response::download($path);
    }
}
