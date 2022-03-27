<?php

namespace App\Http\Middleware;

use App\Providers\RouteServiceProvider;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RedirectIfAuthenticated
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  string|null  ...$guards
     * @return mixed
     */
    public function handle($request, Closure $next, $guard = null)
    {
        //$guards = empty($guards) ? [null] : $guards;

      //  foreach ($guards as $guard) {
            if (Auth::guard($guard)->check()) {
              $role = Auth::user()->role;
              //switch statement to check the role of the user logging in
              switch($role)
              {
                case 'Admin':
                  return redirect('/admindash');
                  break;
                case 'Teacher':
                  return redirect('/teacher_home');
                  break;
                case 'Parent':
                  return redirect('/parentlanding');
                  break;
                case 'Librarian':
                    return redirect('/library');
                    break;
                default:
                  return redirect('/');
                  break;
              }
            }
            return $next($request);

        }


}
//if (Auth::guard($guard)->check())
//{
//  $role = Auth::
//}
