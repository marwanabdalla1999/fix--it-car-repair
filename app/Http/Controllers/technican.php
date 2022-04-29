<?php

namespace App\Http\Controllers;

use App\provider_data;
use Illuminate\Http\Request;
use phpDocumentor\Reflection\Utils;

class technican extends Controller
{
    function add_new_provider($request){
        $input=$request->all();
            if ($request->hasFile('image')){
                $destination='public/images/provier_photos';
                $image=$request->file('image');
                $image_name=$image->getClientOriginalName();
                $path=$request->file('image')->storeAs($destination,$image_name);
                    $input['image']=$image_name;
            }
        $data = provider_data::Create([

            'name' => $request->name,
            'phone' => $request->phone,
            'token' => Str::random(50),
            'photo' => $input->image,

        ]);

        return $data;
    }
}
