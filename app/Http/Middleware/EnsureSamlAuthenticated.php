<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class EnsureSamlAuthenticated
{
    public function handle(Request $request, Closure $next)
    {
        if (!Session::has('samlUserdata')) {
            return redirect()->route('saml.sso');
        }

        return $next($request);
    }
}
