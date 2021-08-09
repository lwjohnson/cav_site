<?php

namespace App\Http\Middleware;

use Closure;

class PopulateSidebar
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
      $side_navigation = [
        '<span class="far fa-home" aria-hidden="true"></span> Home'=>'https://www.roanoke.edu',
        'Inside' =>'http://www.insideroanoke.com/'
        ];

        view()->share("side_navigation", $side_navigation);

        return $next($request);
    }
}
