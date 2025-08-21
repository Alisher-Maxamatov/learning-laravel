<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class SuperAdminMiddleware
{
    public function handle(Request $request, Closure $next): Response
    {
        if (!auth()->check() || auth()->user()->role !== 'superadmin') {
            abort(403, 'Bu sahifaga faqat Super Admin kirishi mumkin!');
        }

        return $next($request);
    }
}
