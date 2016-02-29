<?php

namespace SteveAzz\RuDolly;

use Closure;
use Illuminate\Support\Facades\Cache;

class FlushView
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
        if (app()->environment() == 'local') {
            Cache::tags('views')->flush();
        }
        return $next($request);
    }
}
