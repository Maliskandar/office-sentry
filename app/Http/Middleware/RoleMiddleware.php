<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;
use Spatie\Permission\Traits\HasRoles;


class RoleMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  string  $role
     * @return mixed
     */public function handle($request, Closure $next, $role)
    {
        if (!Auth::check()) {
            // User tidak terautentikasi
            return redirect('login');
        }

        $user = Auth::user();
        if ($user->hasRole($role)) {
            // User memiliki role yang diperlukan
            return $next($request);
        }

        // User tidak memiliki role yang diperlukan
        abort(403, 'Anda tidak memiliki izin untuk mengakses halaman ini.');
    }

}