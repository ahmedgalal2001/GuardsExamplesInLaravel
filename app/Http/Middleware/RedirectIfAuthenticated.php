<?php

namespace App\Http\Middleware;

use App\Enums\GuardType;
use Closure;
use Illuminate\Foundation\Configuration\Middleware;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RedirectIfAuthenticated extends Middleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  string|null  ...$guards
     * @return mixed
     */
    public function handle(Request $request, Closure $next, ...$guards)
    {
        $guards = empty($guards) ? [null] : $guards;

        foreach ($guards as $guard) {
            if (Auth::guard($guard)->check()) {
                return redirect($this->redirectPath($guard));
            } else {
                $guards = [GuardType::Instructor, GuardType::Parent];
                foreach ($guards as $guard) {
                    if (Auth::guard($guard->value)->check()) {
                        return redirect($this->redirectPath($guard));
                    }
                }
            }
        }
        return $next($request);
    }

    /**
     * Get the path to redirect the user based on their guard.
     *
     * @param  string|null  $guard
     * @return string
     */
    protected function redirectPath($guard)
    {
        switch ($guard) {
            case GuardType::Instructor:
                return '/instructor/home';
            case GuardType::Parent:
                return '/parent/home';
            default:
                return '/parent/home';
        }
    }
}
