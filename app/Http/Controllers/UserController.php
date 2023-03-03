<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB as Db;

class UserController extends Controller
{
    //

    public function test(){
          
        // $list =  DB::select("select * from user where id=?",[2]);
        // foreach($list as $user){
        //      echo $user->name."<br/>";
        // }

        // $data = ["小静",md5("123456"),date("Y-m-d H:i:s")];
        // $rows = DB::insert("insert into user(name,password,birthday) values(?,?,?)",$data);
        // dd($rows); //true

        // $affected_rows = DB::update("update user set name=? where id = ?",["小徐",3]);
        // dd($affected_rows);

        // $affected_rows = DB::delete("delete from user where id = 1");
        // dd($affected_rows);
        try{
            
            //第二个参数重试次数 解决死锁问题
            DB::transaction(function(){

                DB::table("user")->where(["id"=>10])->update(["name"=>"小小小静"]);

                $data = [
                    "name"=>"哈哈",
                    "password"=>md5("123456"),
                    "birthday"=>date("Y-m-d H:i:s")
                ];
                DB::table("user")->insert($data);
            },5);
        }catch(\Exception $e){
            echo $e->getMessage();
        }



        DB::table("user")->where(["id"=>11])->update(["name"=>"小小静"]);
        $rst = DB::table("user")->find(11);
          dd($rst);
        return "test";

    }



}
