<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class unsubscribe extends Controller
{
    public function unsubscribeFunc(Request $request){
        $users = DB::table('ajaxes')->where('uid',$request['uid'])->delete();
        echo "Successfully Unsubscribe to Newsletter";
    }
}
