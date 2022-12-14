<?php

namespace App\Http\Controllers;

use App\add_user_car;
use App\brand_type;
use App\brand_type_model;
use App\order_model;
use App\provider_data;
use App\provider_login;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class technican extends Controller
{
    function add_new_provider(Request $request){
$checked=$request->input('specialized_at');
        $specialized = implode(',', $checked);

        $data1 = provider_login::Create([

            'password' => $request->password,
            'token' => Str::random(50),
            'username' => $request->username]);
        $data = provider_data::Create([
            'name' => $request->name,
            'phone' => $request->phone,
            'provider_id' => $data1->id,
            'specialized_in' =>$specialized,
        ]);

        return redirect()->route('add-technicians')->with('success','technician is added') ;
    }
    function show_tech(Request $request){

        $tech=provider_data::all();
        return  view('backend.pages.technicians.show-technicians')->with('adminData',$tech);
    }

    public function image($fileName){

        $path = 'https://fix--it-car-repair.herokuapp.com/temp/photos/'.$fileName;
        return $path;

    }

    function provider_login(Request $request){
        $tech_id = provider_login::where([['username','=',$request->username],['password','=',$request->password]])->first();

        if ($tech_id) {
            if ($request->device_token!="0"){
                $tech_id->device_token=$request->device_token;
                $tech_id->save();}
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
        $tech_id =provider_login::where([['id', '=', $request->id], ['token', '=', $request->token]])->first();
        if ($tech_id){
            if ($request->device_token!="0"){
            $tech_id->device_token=$request->device_token;
            $tech_id->save();}
                $hasOrder =order_model::where([['tech_id', '=', $request->id],
                    ['state', '=', 'in progress']])->orWhere([['tech_id', '=', $request->id],
                    ['state', '=', 'wait for paying']])->first();
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

    function update_tech_location(Request $request){
        $tech=provider_data::where('provider_id',$request->id)->first();
        if ($tech){

            $tech->provider_location=$request->tech_location;
            $tech->save();
            return 'updated';
        }

        else{

            return 'error';
        }

    }

    function get_orders_tech(Request $request){

        $orders = order_model::where('tech_id',$request->id)->get();
        if ($orders){
            foreach ($orders as $order){
                $car=add_user_car::where('id',$order->car_id)->first();
                if ($car) {

                    $order->car_id=$car->brand." ".$car->model;

                }
            }
            return $orders;

        }else{

            return 'Empty';
        }


    }
}
