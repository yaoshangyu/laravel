<?php

namespace App\Providers;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\ServiceProvider;
use Illuminate\Pagination\Paginator;
use App\Models\Admin;
use App\Observers\AdminObserve;
use Illuminate\Http\Resources\Json\Resource;
use \Illuminate\Support\Facades\Route;


class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {

        Paginator::defaultView("vendor.pagination.test");
        //SQL监听
        // DB::listen(function($query){

        //     //runoob 123,456
        //     echo $query->sql." param:".join("/",$query->bindings)."<br/>";
        //     echo ($query->time/1000)."s<br/>";
            
        // });


        //Resource::withoutWrapping();

       // Admin::observe(AdminObserve::class);

       Route::resourceVerbs([
           'create' => 'new_add',
        //   'edit' => 'add'
       ]);
    }
}
