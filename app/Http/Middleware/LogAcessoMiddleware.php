<?php

namespace App\Http\Middleware;

use Closure;
use App\LogAcesso;

class LogAcessoMiddleware
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
        // $request manipulará a requisição
        // return $next($request);
        LogAcesso::create([
            'log' =>$request->url(),
            'ip' => $request->ip()
        ]);
        $resposta = $next($request);

        $resposta->setStatusCode(201, 'O Status foi alterado');

        return $resposta;
    }
}
