<?php

namespace App\Http\Middleware;

use Closure;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class WebAuthMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $token = session('token');
        $authenticate = true;

        if(!$token){
            $authenticate = false;
        }

        $user = User::where('remember_token', $token)->first();

        if(!$user){
            $authenticate = false;
        }else{
            // Auth::login($user);
        }

        if($authenticate){
            return $next($request);
        } else{
            Log::info("Unauthorized access");
            return redirect('/login');
        }

        return $next($request);
    }
}
