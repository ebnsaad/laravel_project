<?php

namespace App\Http\Middleware;

use Closure;
use App;


class language
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
        if(! $request->session()->get('lan')){

        }else if($request->session()->get('lan')=="en"){
            App::setlocale('en');
        }
    
        return $next($request);
    }
}
