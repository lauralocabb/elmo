<?php

namespace App\Http\Middleware;

use Closure;

class OnlyAdmin
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
        if(auth()->user()->type != 'admin'){
            $message = 'Permiso denegado: Solo los administradores pueden entrar a esta sección';
            return redirect('admin/home')->with('message', $message);
        }

        return $next($request);
    }
}
