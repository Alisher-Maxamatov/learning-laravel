<?php

namespace App\Http\Middleware;

use Closure;
use Couchbase\Role;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class RoleMiddleware
{
    /**@param \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response) $next
     */
    public function handle(Request $request, Closure $next, Role $roles)
    {
        $user = $request->user();
        if (!$user) {
            return response()->json(['message' => 'Unauthorized'], 401);
        }

            if (!in_array($user->role, $roles)){
            return response()->json(['message' => "Access denied"], 403);
        };
        return $next($request);
    }
}
