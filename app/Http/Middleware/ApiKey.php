<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class ApiKey
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        $header = $request->header('Authorization');

        $token = $request->bearerToken();

        if(isset($token)){
            return $next($request);
        }else{
            return response()->json('Provide api key in the authorization header');
        }

        //===now get the Api key
        //$apiKey = $header['Bearer Token'];
        //$apiKey = $r
        //(isset($apiKey) && $apiKey == env('API_KEY') ){
            //what do i do if condition is met.
        //    return $next($request);
        //}else{
        //    return response()->json('Provided apiKey not true');
        //}

    }
}
