<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class AdminPanelMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  Closure(Request): (Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if (!auth()->user()){
            return redirect('home');
        }

        if(auth()->user()->role !== 'admin'){
            abort(403);
//            return redirect()->route('welcome.index');
        }

        return $next($request);
    }
}
