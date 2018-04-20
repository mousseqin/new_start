<?php

namespace App\Http\Middleware;

use Closure;

class CheckRole
{
    /**
     * 处理输入请求
     *
     * @param \Illuminate\Http\Request $request
     * @param \Closure $next
     * @param string $role
     * @return mixed
     * translator http://laravelacademy.org
     */
    public function handle($request, Closure $next, $role)
    {
        d($request->user());
        if (! $request->user()->hasRole($role)) {
            // Redirect...
            d(11);
        }
        d(22);
        return $next($request);
    }
    
}
