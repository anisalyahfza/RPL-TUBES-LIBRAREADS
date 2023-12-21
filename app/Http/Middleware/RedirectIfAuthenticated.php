<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Providers\RouteServiceProvider;
use Illuminate\Support\Facades\Session;
use Symfony\Component\HttpFoundation\Response;

class RedirectIfAuthenticated
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next, string ...$guards): Response
    {
        $guards = empty($guards) ? [null] : $guards;

        foreach ($guards as $guard) {
            if (Auth::guard($guard)->check()) {
                $role = Auth::user()->role;
                switch ($role) {
                    case 'ADMIN':
                        return redirect(route('admin.dashboard.index'));
                        break;
                    case 'MEMBER':
                        return redirect(route('member.dashboard.index'));
                        break;
                    case 'SUPERADMIN':
                        return redirect(route('super.dashboard.index'));
                        break;
                    default:
                        return Session::get('previous', url('/'));
                        break;
                }
            }
        }

        return $next($request);
    }
}
