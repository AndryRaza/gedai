<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class Admin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $user = $request->user();


        if ($user && $user->role_id == 0) {
            return $next($request);
        }
        
        Log::warning($user->nom . ' ' . $user->prenom . ' a tenté d\'accèder aux pages d\'administration.');

        auth::logout();
        return redirect('');
        die();
    }
}
