<?php

namespace Kvnc\SpamShield\Http\Middleware;

use Illuminate\Http\Request;
use Closure;
use Kvnc\SpammerShield\Exceptions\SpamShieldException;
use Kvnc\SpammerShield\Shield;

class SpammerShieldMiddleware
{

    public function handle(Request $request, Closure $next)
    {
        if (! $request->isMethod('POST')) {
            return $next($request);
        }
        try {
            app(Shield::class)->checkRules($request);
        }catch (SpamShieldException | \Throwable $e)
        {
            abort(404);
        }
        return $next($request);
    }
}
