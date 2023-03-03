<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;
use App\Models\Admin;
use App\Models\AdminAddress;
use App\Http\Resources\Admins as AdminResourceCollection;
use  App\Http\Resources\Admin as AdminResource;


class MyController extends Controller
{
    //


    public function show($id){

        return $id;

    }

    public function show2(){

        return "show2";

    }

    public function show3(){

      return ["name"=>"Sally",'created' => true];

    }

    public function show7($id){
     
        return "show7_".$id;

    }

    public function show13(Request $request){
        if($request->route()->named("show13")){
            return "hahaha";
        }

    }

    public function show14(Request $request){
         if($request->route()->named("show14")){
              return "show14";
         }else{
              return "show14_no";
         }
    }

    public function database($id){

        // $rows = DB::table("admin")->get();
        // var_dump($rows);
        // exit;
        
       // $row = DB::table("admin")->where("id",">",1)->first();
        //dd($row->name);

        // $name = DB::table("admin")->where("id",1)->value("name");
        // dd($name);
        //获取一列的值
        // $names = DB::table("admin")->where("id",">",1)->pluck("name","id");
        // dd($names);
        // foreach($names as $v){
        //      dd($v);
        // }
       // dd($names);


    //    $arr = ["a",'b','c','d'];
    //    $find = ['a'];
    //    $replace = ['c','d'];
    //    dd(str_replace($find,$replace,$arr));
    //    return;

       //分块
    //    DB::table("admin")->where("id",">",1)
    //          ->where(function($query){
    //              $query->where("sex",2);
    //          })
    //          ->where("create_time",">","2023-02-04 10:48:11")
    //          ->where("create_time","<","2023-02-05 22:50:11")
    //          ->chunkById(1,function($rows){
    //          foreach($rows as $row){
    //             DB::table("admin")->where(["id"=>$row->id])->update(["sex"=>1]);
    //          }


    //    });
       //聚合查询
    //    $num = DB::table("admin")->count();
    //    $num = DB::table("admin")->sum("sex");
        //   $rst = DB::table("admin")->where("id",1)->doesntExist();  
        //   dd($rst); 
        // $query = DB::table("admin")->where("id",">",1)->distinct()->select("id","name","password");
        // $row = $query->addSelect("sex")->get();
        // dd($row);

        //  $rows = DB::table("admin")
        //           ->rightjoin("depart","admin.depart_id","=","depart.id")
        //           ->select("admin.id","admin.name")
        //           ->addSelect("admin.sex")
        //           ->selectRaw("depart.id as depart_id,depart.name as depart_name")
        //           ->get();
        //           dd($rows);

        //笛卡尔积
        // $rows = DB::table("admin")->crossJoin("depart")
        // ->select("admin.*","depart.id as did")
        // ->get();
       
        // $rows = DB::table("admin")
        // ->join("depart",function($join){
        //    $join->on("admin.depart_id","=","depart.id");
        //         //->where("admin.id",">",1);

        // })
        // ->where("admin.id",">",1)
        // ->select("admin.*","depart.id as did","depart.name as dname")
        // ->get();
        // dd($rows);
    //    $admin = DB::table("admin")->where("id",">",1)->select(DB::raw("id,name,sex"),"depart_id");
    //    $rows = DB::table("depart")->joinSub($admin,"admin",function($join){

    //            $join->on("depart.id","=","admin.depart_id");
    //    })
    //    ->selectRaw("depart.id,depart.name as depart_name,admin.id as admin_id,admin.name")
    //    ->get();
    //    dd($rows);

        //  $admin_1 = DB::table("admin")->where("id",">",1);
        //  $rows = DB::table("admin")->where("id",">",2)
        //             ->unionAll($admin_1)
        //             ->get();
        //             dd($rows);

    // $rows = DB::table("admin")
    //    ->where([
    //     ["name","like","小%"],
    //     ["id","!=",3]
    //    ])
    //    ->orWhere("id",3)
    //    ->get();
    // dd($rows);

    // $rows = DB::table("admin")->whereNotBetween("id",[1,2])->get();
    // dd($rows);

    
    // $rows = DB::table("admin")->whereNotIn("id",[1,2])->get();
    // dd($rows);

    
    // $rows = DB::table("admin")->whereNull("id")->get();
    // dd($rows);
        
    // $rows = DB::table("admin")->whereTime("create_time","10:48:11")->get();
    // dd($rows);
        
    // $rows = DB::table("admin")->whereColumn("create_time","update_time")->get();
    // dd($rows);

    // $rows = DB::table("admin")->where([["id","!=",1],["id",3]])
    // ->orWhere("id",4)
    // ->get();

    // $rows = DB::table("admin")
    // ->orWhere("id",4)
    // ->where(function($query){
    //     $query->where("id",5)->orWhere("id",4);
    // })
    // ->get();
    // dd($rows);
    // 
    // $rows = DB::table("admin")->whereIn("id",[1,2,3])->whereExists(function($query){
        
    //     $query->from("depart")->whereRaw("admin.depart_id = depart.id")
    //     ->selectRaw("1");

    // })->oldest("create_time")
    // ->get();
    //     $rows = DB::table("admin")->groupBy("depart_id")
    //     ->havingRaw("num>1")
    //     ->select(DB::raw("count(id) as num"),"depart_id")
    //    // ->select("*")
    //     ->get();
    //$role = "小红";
    // $rows = DB::table("admin")->where("id",">",1)
    //         ->when($role,function($query,$role){
    //             return $query->where("name","like","%".$role);

    //         },function($query){
    //              return $query->where("name","like","%红");
    //         })
    //        ->get();
    // $data = [
    //     "password"=>md5("123456"),
    //     "depart_id"=>2,
    //     "sex"=>1,
    //     "create_time"=>date("Y-m-d H:i:s"),
    //     "update_time"=>date("Y-m-d H:i:s"),
    //     "desc"=>"你猜猜看"
    // ];
    // $rows = DB::table("admin")->insertGetId($data);
   // $rows = DB::table("admin")->updateOrInsert(["name"=>"小远"],$data);
   // $rows = DB::table("admin")->whereRaw("id=8")->update(["name"=>"小姚"]);
    //$rows = DB::table("admin")->whereRaw("id=8")->delete();

    // DB::beginTransaction();
    // //$rows = DB::table("admin")->whereRaw("id=9")->sharedLock()->get();
    // $rows = DB::table("admin")->whereRaw("id=9")->lockForUpdate()->get();

    // DB::commit();
     //$rows = DB::table("admin")->paginate(1);
    //$rows = DB::table("admin")->simplePaginate(2);
    
     //$rows->withPath("http://www.baidu.com");

    //  $rows->appends(["name"=>"ysy","sex"=>"男"])->fragment("hash");
    //  $rows->onEachSide(2);


//    $rows =  Admin::where(["id"=>1])->get();
//    foreach($rows as $k=>$v){
//        echo $v->name;
//    }
    
    // $row = Admin::where(["id"=>2])->first();
    // $row_2 = $row->fresh();

    // $row = Admin::where(["id"=>2])->first();
    // $row->name="北京";
    // echo $row->name;
    // $row->refresh();
    // echo $row->name;

    // $rows = Admin::where("id",">",1)->get();
    // $rows->reject(function($row){
    //     echo $row->id.'#'.$row->name."<br/>";
    // });
    //游标 php中的yield 减少内存使用
    // $rows = Admin::where("id",">",1)->cursor();
    // foreach($rows as $row){
    //     echo $row->name;
    // }
    
   // $row = Admin::find([1,2]);

//    try{

//     Admin::findOrFail(1111);
//    }catch(\Exception $e){
//          echo $e->getMessage();
//    }
 
//    $row = Admin::count();
//    dd($row);

    //添加数据  model
    //   $admin_model = new Admin();
    //   $admin_model->name = "校招";
    //    //没有值会去attributes属性中读取
    //   //$admin_model->password = md5("121212");
    //   $admin_model->sex = 2;
    //   $admin_model->create_time = date("Y-m-d H:i:s");
    //   $admin_model->update_time = date("Y-m-d H:i:s");
    //   $admin_model->save();
    //   dd($admin_model->id); //获取添加后的主键ID
     
    //    $admin_model = Admin::find(11);
    //    $admin_model->name = "小赵";
    //    $admin_model->save();

      //Admin::where("id",11)->update(["name"=>"不知道"]);
     //Admin::create(["name"=>'ssss','password'=>'23242',"sex"=>0]);
    //  $admin_model= Admin::create(["name"=>'我不知道','password'=>'23242',"sex"=>1,"desc"=>"black"]);
    //  dd($admin_model->id);
    //  $admin_model->fill(["name"=>"fill"]);

    //    $admin_model =  Admin::firstOrCreate(["name"=>"你猜猜","password"=>"sfsfds"],["sex"=>2]);
    //     echo $admin_model->id;

    // $admin_model =  Admin::firstOrNew(["name"=>"你猜猜111","password"=>"sfsfds"],["sex"=>2]);
    //  $admin_model->save();
    
    // $rst=  Admin::updateOrCreate(["id"=>"22"],["depart_id"=>2]);
    // dd($rst);
    // $admin_model = Admin::find(22);
    // $admin_model->delete();

     //Admin::where(["id"=>15])->delete();
    //  $admin_model = new Admin();
    //  echo $admin_model->test();
   
    // $admin_model = Admin::find(15);
    // //$admin_model = Admin::withTrashed()->where("id",">",1)->get();
    // $admin_model = new Admin();
    // $rows = $admin_model->onlyTrashed()->where("id",">",12)->get();
    // foreach($rows as $row){
    //    echo intval($row->trashed())."<br/>";
    //    $row->restore(); //撤销删除 deleted_at字段置空
    // }
    // $row = Admin::withTrashed()
    // //->withoutGlobalScopes(["test"])
    // ->test(12121)
    // ->where("id",17)->first();
    // if($row && method_exists($row,"toArray")){
    //      $row = $row->toArray();
    //      echo $row["id"]."#".$row["name"];
    // }
    
    //获取模型实例后 删除才可以触发观察者AdminObserve方法
    //Admin::withTrashed()->where("id",7)->delete();//不可以触发
    // $admin_model = Admin::withTrashed()->where("id",7)->first();
    // $admin_model->delete();

    //   $row = AdminAddress::where("id",1)->first();
    //   dd($row->user);

    // $row = Admin::find(1)->addresses->toArray();
    //  dd($row);
    // $admin_model = Admin::find(2);
    // dd($admin_model->roles);

    // $role_model = \App\Models\Role::find(2);
    // foreach($role_model->admin as $admin){
    //    echo $admin->id.'#'.$admin->name;
    //    echo '<br/>';
    //    dd($admin->pivot->id).'<br/>';
    // }

    // $rows = Admin::all();
    // dd($rows->filter(function($item){
    //     return $item->id<3?false:true;
    // })->map(function($item){
    //      return $item->name;
    // }));
   
    // $row = Admin::where("id",2)->first();
    // $row->update_time = time();
    // $row->save();
    // dd($row);
    // dd($row->update_time);
    // $row = Admin::where("id",2)->first();
    // $desc = $row->desc;
    // $desc["date"] = now();
    // $row->desc = $desc;
    // $row->save();

  //return  new AdminResource(Admin::where("id",2)->first());


  dd(Admin::find(2)->append('delete_date')->makeHidden("name")->toArray());
     return (new AdminResourceCollection(Admin::paginate(2)))
             ->additional([
                "my"=>'lei'
             ])->response()->header('x-my','lei');

  }

    public function do($content){
        
        $url = '175.24.234.53:9501';
        $data = [
            "type"=>'speak',
            'msg'=>$content
        ];
        $rst = $this->curl_http($url,$data);
       dd($rst);
    }


    protected function curl_http($url,$data){

        $ch = curl_init ();
        curl_setopt ( $ch, CURLOPT_URL, $url );
        curl_setopt ( $ch, CURLOPT_POST, 1 );
        curl_setopt ( $ch, CURLOPT_HEADER, 0 );
        curl_setopt ( $ch, CURLOPT_RETURNTRANSFER, 1 );
        curl_setopt ( $ch, CURLOPT_POSTFIELDS, $data);
        $return = curl_exec ( $ch );
        curl_close ( $ch );

        return $return;
    }

    public function does($content){


     return Route::currentRouteAction();

    }

}
