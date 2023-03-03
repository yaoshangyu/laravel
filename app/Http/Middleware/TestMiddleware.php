<?php

namespace App\Http\Middleware;

use Closure;

class TestMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next,$name='')
    {
     
        if(!$request->has("test_name")){
            throw new \Exception("Missing Param test_name");
        }

        if($name && $request->query('test_name')==$name){
            throw new \Exception("name not allowed");
        }
        $response = $next($request);

        return $response;
    }
}
