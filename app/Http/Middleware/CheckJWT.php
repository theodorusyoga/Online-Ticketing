<?php

namespace App\Http\Middleware;

use Closure;
use JWTAuth;
use Response;

class CheckJWT
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
        $header = str_replace('Bearer ', '', $request->header('Authorization'));

        if(JWTAuth::setToken($header)->authenticate()){
            return $next($request);
        }
        else {
            return Response::json(array('status' => '1', 'message' => 'Invalid token'));
        }

    }
}
