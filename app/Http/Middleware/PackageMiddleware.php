<?php

namespace App\Http\Middleware;

use Closure;

class PackageMiddleware
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
        if($request->package) {
            return $next($request);
        }
        else{
            return back()->with([
                'type' => 'warning',
                'message' => "Please Select A Package First"
            ]);
        }
    }
}
