<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class isAdmin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        $user = auth()->user();
        // Check if the user's role_id is 2 (or any other role you want to restrict)
        if ($user && $user->role_id == 2) {
            return $next($request); // Allow access to the route
        }
        // If the user's role_id is not 2, you can customize the response or redirect them
        return redirect()->route('unauthorized')->with('error', 'Unauthorized access.');
    }
}
