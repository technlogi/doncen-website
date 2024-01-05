<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;
use \Session;

class RedirectIfNotUser
{
	/**
	 * Handle an incoming request.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @param  \Closure  $next
	 * @param  string|null  $guard
	 * @return mixed
	 */
	public function handle($request, Closure $next, $guard = 'user')
	{
	    
	    

	    $previous_url =  url()->previous();
	    
	    $redirect_url =  url()->current();  // Originally clicked URL

	    if (!Auth::guard($guard)->check()) {

	    	session(['redirect_url' => $redirect_url]);


	        return redirect('user/login');
	    }
	
	    return $next($request);
	}
}