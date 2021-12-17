<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LoginController extends Controller
{
    public function index()
    {
        return view('site.login', ['titulo' => 'Login']);
    }

    public function autenticar(Request $request)
    {
        $regras = [
            'usuario' => 'required|email',
            'senha' => 'required|min:3|max:20'
        ];

        //feedback de validação
        $mensagens = [
            'usuario.required' => 'O campo usuário deve ser um e-mail válido',
            'usuario.email' => 'O campo usuário deve ser um e-mail válido',
            'senha.required' => 'O campo senha é obrigatório',
            'senha.min' => 'O campo senha deve ter no mínimo 3 caracteres',
            'senha.max' => 'O campo senha deve ter no máximo 20 caracteres'
        ];

        $request->validate($regras, $mensagens);

        print_r($request->all());
    }
}
