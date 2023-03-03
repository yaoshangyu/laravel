<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AdminController extends Controller
{
    //


    public function __construct(){

       $this->middleware("test")->except("test");
       $this->middleware(function($request,$next){
            if($request->has("test_name")){
                     //$request->test_name = 111;
            }
             
            return $next($request);
       });
    }


    public function list(Request $request){
           

        
        $request->flashOnly(['username']);

        return $request->old('username');
       
    

    }

    public function feb(){

        return view("admin.feb",['data'=>\App\Models\Admin::find(1)]);
    }

    public function test(Request $re){

        return session()->flush();

        return $re->session()->push('arr','golang');
         return call_user_func_array([$this,'my'],['你好','sss']);


        return response('sss')->cookie("name","yao",10);
    }


    protected function my($name){
      

        $cookie = cookie('username',$name);

        \Illuminate\Support\Facades\cookie::queue('usenrmae',$name);


        return response('hello',200)->withHeaders([
            'content-type'=>"application/json"
        ]);
        return response()->json([
           'name'=>'3232'

        ]);
       // return response('sss')->cookie($cookie);

          
    }


}
