<?php


Route::group(['prefix'=>'admin'],function(){

    Route::get("feb","AdminController@feb");
    Route::get('list','AdminController@list');
    Route::get('test','AdminController@test');

    Route::resource("resource","AdminResource")->names([
           'create' => 'resource.new_add',
           'store'  => 'resource.add'
    ])->parameters([
           'resource'=>'id'
    ]);
  
  });