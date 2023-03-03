<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Redis;

class OrderController extends Controller
{
    //

   public function list(){
      return "list";
   }

   public function show(){
      return "show";
   }

   public function test1($name){
     $sql = "select * from user where username='{$name}'";

    return $sql;
 }

 public function test2(){
    return "test2";
 }

   public function redis1(){
       
       $rst = Redis::set("name","ysddy");
       // dd(Redis::get("name"));
       Redis::publish("test-channel","hello world");

       return Redis::command("get",["name"]);
   }

   public function redis2(){
      
      Redis::publish("test-channel2","你好，世界");

   }

}
