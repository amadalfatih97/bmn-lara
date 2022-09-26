<?php

namespace App\Http\Middleware;

use Closure;

class CekLevel
{
    public function handle($request, Closure $next, ...$roles)
    {
        if (in_array($request->user()->role,$roles)) {
            # code...
            return $next($request);
        }
        return redirect('/page-not-found');

    }
}
