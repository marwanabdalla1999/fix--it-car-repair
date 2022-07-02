<?php

namespace App\Http\Controllers;

use App\add_user_car;
use App\admin_model;
use App\brand_type;
use App\brand_type_model;
use App\customer;
use App\order_model;
use App\provider_data;
use App\provider_login;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class admin extends Controller
{
    function add_admin(Request $request){

        $data1 = admin_model::Create([

            'email' => $request->email,
            'phone' => $request->phone,
            'name' => $request->name,
            'password'=>$request->password

        ]);


        return  redirect()->route('add-admin')->with('success','admin is added') ;
    }

    function show_admin(Request $request){

        $admin=admin_model::all();
        return  view('backend.pages.admin.show-admin')->with('adminData',$admin);
    }
    function home(Request $request){

        $admin=count(admin_model::all());
        $user=count(customer::all());
        $order=count(order_model::all());
        $tech=count(provider_data::all());

        $data['admin']=$admin;
        $data['user']=$user;
        $data['order']=$order;
        $data['tech']=$tech;


        return  view('backend.pages.home.home')->with('adminData',$data);
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





}
