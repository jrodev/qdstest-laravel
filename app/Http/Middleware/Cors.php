<?php

namespace App\Http\Middleware;

use Closure;

class Cors
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        //return $next($request);
/*
        $headers = [
            'Access-Control-Allow-Methods' => $allow,
            'Access-Control-Max-Age' => 3600,
            'Access-Control-Allow-Headers' => 'X-Requested-With, Origin, X-Csrftoken, Content-Type, Accept',
        ];
        return $response->withHeaders($headers);*/
        return $next($request)
        ->header('Access-Control-Allow-Origin', '*')
        ->header('Access-Control-Allow-Methods', '*') // GET, POST, PUT, DELETE, OPTIONS
        ->header('Access-Control-Allow-Headers', '*'); // Accept, Authorization, Content-Type, X-Requested-With, Origin, X-Csrftoken, Content-Type, Accept, , Application
    }
}
