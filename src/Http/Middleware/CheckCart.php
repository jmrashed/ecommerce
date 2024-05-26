<?php

namespace Jmrashed\Ecommerce\Http\Middleware;

use Closure;

class CheckCart
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
        // Your middleware logic goes here
        // For example, you can check if the user has items in the shopping cart

        return $next($request);
    }
}
