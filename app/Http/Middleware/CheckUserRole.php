<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Auth;

class CheckUserRole
{ 
    public function handle($request, Closure $next)
    {
        $user = Auth::user();
        $roles = $user->getRoleNames();
        if (Auth::check()==false || count($roles)==0) {
            return redirect()->route('no-role-page');
        }
        return $next($request);
    }
}
