<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Auth;
use App\Models\OfficeBoy;

class EnsureProfileIsComplete
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle($request, Closure $next)
    {
        $user = Auth::user();
        if ($user->role == 'office_boy') {
            $officeBoy = OfficeBoy::where('user_id', $user->id)->first();
            if (!$officeBoy->tahun_masuk || !$officeBoy->tempat_lahir || !$officeBoy->tanggal_lahir || !$officeBoy->no_telepon) {
                // Redirect ke halaman pengisian profil dengan peringatan
                return redirect('path_ke_halaman_profil')->with('warning', 'Harap lengkapi profil Anda.');
            }
        }
        return $next($request);
    }
}