<?php

namespace App\Http\Middleware;

use Closure;

class HasPermission
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next, $permission = '')
    {
        
        $user = $request->user();

        if ($user->isSuperAdmin() || $user->hasPermissionTo($permission)) {
            return $next($request);
        }

        return redirect()->back();
    }
}
