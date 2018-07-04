<?php

namespace App\Http\Middleware;

use Closure;

class CheckUserUser
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
        $nivel = auth()->user()->nivel;

        if($nivel == "Operador"){
            return redirect('/oper/home');
        }
        if($nivel == "Administrador"){
            return redirect('/admin/home');
        }

        return $next($request);
    }
}
