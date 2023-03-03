<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Validation\Rule;

class AdminResource extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return route("resource.editt",[1]);
        return \App\Models\Admin::selectRaw("id,name,password")->paginate(2);


    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view("admin.new_add"); 
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

      //  dd($request->all());
       $request->validate([
          "username" => [
            "required",
            "min:2",
            "max:15",
            "regex:/^test_/"
          ],
          "alias"=>"required_if:username,test_test",
          "sex" => [
            "required",
            Rule::in([0,1,2])
          ],
          "interest"=>"required|array"

       ]);









         
    
        return 0;

        return $request->old('username');

        $admin_model = new  \App\Models\Admin();
        $admin_model -> name = '姚明';
        $admin_model -> password = md5('123456');
        $admin_model -> sex = 1;
        $admin_model -> create_time = time();
        $admin_model -> update_time = time();
        $admin_model -> desc = "你好明天";
        return $admin_model -> save()?1:0;
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
       $admin =  \App\Models\Admin::find($id);
       return view("admin.feb",['data'=>$admin]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        // $admin_model =  \App\Models\Admin::find($id);
        // $admin_model -> name = $request->input("username");
        // $admin_model -> password = md5($request->input("password"));
        // $admin_model -> save();

        $data = [

            'name'=>$request->input("username"),
            'password'=>$request->input("password"),
            'update_time'=>date('Y-m-d H:i:s')
        ];
        \App\Models\Admin::where('id',1)->update($data);
        
       return 1;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
