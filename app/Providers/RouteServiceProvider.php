<?php

namespace App\Providers;

use Illuminate\Support\Facades\Route;
use Illuminate\Foundation\Support\Providers\RouteServiceProvider as ServiceProvider;

class RouteServiceProvider extends ServiceProvider
{
    /**
     * This namespace is applied to your controller routes.
     *
     * In addition, it is set as the URL generator's root namespace.
     *
     * @var string
     */
    protected $namespace = 'App\Http\Controllers';

    /**
     * Define your route model bindings, pattern filters, etc.
     *
     * @return void
     */
    public function boot()
    {
        //路由全局正则匹配
        Route::pattern("name","[0-9]+");

        //路由参数绑定模型实例
        //Route::model("user",\App\Models\User::class);
        //Route::model("user",\App\Models\Admin::class);

        //自定义解析逻辑
        Route::bind("user",function($value){
              $row = \App\Models\User::where(["password"=>$value])->first();
              return $row??abort(404);
        });

    

        parent::boot();
        // Route::bind("idddd",function($value){
        //     return \App\Models\Admin::where("id",$value)->first()??abort(404);
        // });

        // Route::bind("model/admin_address",function($value){
        //     return \App\Models\AdminAddress::where("id",$value)->first()??abort(404);
        // });
    }

    /**
     * Define the routes for the application.
     *
     * @return void
     */
    public function map()
    {
        $this->mapApiRoutes();

        $this->mapWebRoutes();

        //
        $this->mapAdminRoutes();
    }

    /**
     * Define the "web" routes for the application.
     *
     * These routes all receive session state, CSRF protection, etc.
     *
     * @return void
     */
    protected function mapWebRoutes()
    {
        Route::middleware('web')
             ->namespace($this->namespace)
             ->group(base_path('routes/web.php'));
    }

    /**
     * Define the "api" routes for the application.
     *
     * These routes are typically stateless.
     *
     * @return void
     */
    protected function mapApiRoutes()
    {
        Route::prefix('api')
             ->middleware('api')
             ->namespace($this->namespace)
             ->group(base_path('routes/api.php'));
    }

    /**
     * test
     *
     * @return void
     */
    protected function mapAdminRoutes(){
      
        Route::middleware('web')
        ->namespace($this->namespace."\\Admin")
        ->group(base_path('routes/admin.php'));

    }
}
