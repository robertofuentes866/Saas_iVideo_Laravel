<?php

namespace App\Http\Middleware\Auth;

use Closure;
use Illuminate\Http\Request;

class TransformarCampos
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next,$transformador)
    {
        return $next($request);
    }
}
