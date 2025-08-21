<?php
namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class EnsureEmailIsVerifiedOrRedirectToRegister
{
public function handle($request, Closure $next)
{
if (!Auth::check()) {
return redirect()->route('login');
}

if (!Auth::user()->hasVerifiedEmail()) {
return redirect()->route('register');
}

return $next($request);
}
}
