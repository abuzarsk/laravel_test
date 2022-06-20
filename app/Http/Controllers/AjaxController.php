<?php

namespace App\Http\Controllers;

use App\Models\Ajax;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AjaxController extends Controller
{

    public function form_submit(Request $request){
        
        $email = $request->post('email');

        $users = DB::table('ajaxes')->select('id','email', 'uid')->get()->where("email","=",$email);

        if(count($users)<1){
            $uid = rand(99999999,999999999);

            $model = new Ajax();
            $model->email = $email;
            $model->uid = $uid;
            $model->save();
            
            return ["result"=>"Successfully Subscribed!","status"=>"200"];//["result"=>"Data Inserted"];

            
        }else{
            return ["result"=>"Email Already Exists!","status"=>"201"];//["result"=>"Data Inserted"];
            
        }


    }


}
