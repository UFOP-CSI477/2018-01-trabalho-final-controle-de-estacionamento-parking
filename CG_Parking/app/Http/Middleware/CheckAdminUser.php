<?php

namespace App\Http\Middleware;

use Closure;

class CheckAdminUser
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

        if($nivel == "Usuário"){
            return redirect('/user/home');
        }
        if($nivel == "Operador"){
            return redirect('/oper/home');
        }
        return $next($request);
    }
}
