<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });



Route::get('search/{search?}', function ($search=1) {
 return  redirect()->route("feb_list_id",["id"=>22]);
})->where('search', '.*')->name("search");

Route::group(["prefix"=>'feb','middleware'=>['throttle:60,1']],function(){

      Route::get("show",function(){

        return view("admin.feb");
      });

      Route::match(['get','post','put'],"add",function(){

        return "add";
      })->name("feb_add");

      Route::redirect("redirect","add",301);

      Route::get("list/{admin}",function(\App\Models\Admin $admin){

         //return \App\Models\Admin::where("id",$id)->first();
          return $admin->name;
      })->where(["id"=>'.*'])->name("feb_list_id");

});






Route::fallback(function(){

    return 'fallback';
});
