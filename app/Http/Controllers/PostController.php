<?php

namespace App\Http\Controllers;

use App\Models\post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Mail;

class PostController extends Controller
{

    public function postsubmit(Request $request){
    
        $model = new Post();
        $model->title = $request->post('title');
        $model->description = $request->post('description');
        $model->save();

        $users = DB::table('ajaxes')->select('id','email', 'uid')->get();

        for($i=0;$i<count($users);$i++){
            $data = ["title"=>$request->post('title'), "description"=>$request->post('description'), "uid"=>$users[$i]->uid];//["email"=>$users[0]->email];//["name"=>"Abuzar","data"=>"Hello Abuzar"];
            $user["to"]=$users[$i]->email;//"abuzarshaikh922@gmail.com";
            Mail::send('mail',$data,function($messages) use ($user){
                $messages->to($user["to"]);//'mymail@testingteam.live');
                $messages->subject('Hello Dev');
            });     
        }

        return ["result"=>"Successfully Posted and Emails are also sent!","status"=>"200"];//["result"=>"Data Inserted"];

            
    }

}
