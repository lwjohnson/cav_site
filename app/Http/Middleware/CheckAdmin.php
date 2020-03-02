<?php

namespace App\Http\Middleware;

use Closure;
use RCAuth;
use App\Admins;

class CheckAdmin
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

      if (RCAuth::check() || RCAuth::attempt()) {
        $user = Admins::where('username', RCAuth::user()->username)->first();
        if($user!=null){
        $side_navigation = [
          '<span class="far fa-home" aria-hidden="true"></span> Home'=>'https://www.roanoke.edu',
          'Inside' =>'http://www.insideroanoke.com/',
          'Edit Order Toppings' => action("EditOrderOptionsController@show")
          ];

        view()->share("side_navigation", $side_navigation);

      }
      view()->share("is_admin", !empty($user));
      }
      return $next($request);
    }
}
