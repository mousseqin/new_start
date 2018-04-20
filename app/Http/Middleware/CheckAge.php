<?php

namespace App\Http\Middleware;

use Closure;

class CheckAge
{
    /**
     * 返回请求过滤器
     *
     * @param \Illuminate\Http\Request $request
     * @param \Closure $next
     * @return mixed
     */
    public function handle($request, Closure $next,$age)
    {
        if ($age >= 200) {
            return redirect('home');
        }
        return $next($request);
    }
}
