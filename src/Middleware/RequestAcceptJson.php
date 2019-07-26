<?php

namespace Softonic\RequestAcceptJson\Middleware;

use Closure;
use Illuminate\Http\Request;

class RequestAcceptJson
{
    public function handle(Request $request, Closure $next)
    {
        $request->headers->set('Accept', 'application/json');

        return $next($request);
    }
}
