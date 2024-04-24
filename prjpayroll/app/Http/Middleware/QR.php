<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class QR
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $type = Auth::user()->userType;
        if($type != 'QR'){
            if($type == 'ADMIN'){
                return redirect('admin/dashboard');
            }else{
                return redirect('employee/dashboard');
            }
        }
        return $next($request);
    }
}
