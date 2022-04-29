<?php

namespace App\Http\Controllers;

use App\provider_data;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use phpDocumentor\Reflection\Utils;

class technican extends Controller
{
    function add_new_provider(Request $request){
        $input=$request->all();
            if ($request->hasFile('photo')){
                $destination='public/images/provier_photos';
                $image=$request->file('photo');
                $image_name=$image->getClientOriginalName();
                $path=$request->file('photo')->storeAs($destination,$image_name);
                    $request['photo']=$image_name;
            }

        $data = provider_data::Create([

            'name' => $request->name,
            'phone' => $request->phone,
            'token' => Str::random(50),

        ]);

        return $request->photo;
    }
}
