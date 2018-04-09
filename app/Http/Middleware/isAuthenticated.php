<?php

namespace App\Http\Middleware;

use Closure;

class isAuthenticated
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
        if(!session()->get('user_id')) {
            if(strpos($_SERVER['REQUEST_URI'], "web_admin") !== false) {
                return redirect('/web_admin');
            }
            else {
                return redirect('/');
            }
        }
        return $next($request);
    }
}
