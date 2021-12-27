<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;


class LoginController extends Controller
{
    public function index(Request $request)
    {
        $erro = '';
        
        if($request->get('erro') == 1) {
            $erro = 'Usuário ou senha inválidos!';
        }
        return view('site.login', ['titulo' => 'Login', 'erro' => $erro]);
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

        //validação de regras
        $request->validate($regras, $mensagens);
        
        //recuperando parâmetros do formulário em variáveis
        $email = $request->get('usuario');
        $password = $request->get('senha');

        //iniciar o model User
        $user = new User();

        //verificar se o usuário existe
        $usuario = $user->where('email', $email)->where('password', $password)->get()->first();

        if(isset($usuario->name)) {
            echo 'usuário existe';
        } else {
            return redirect()->route('site.login', ['erro' => 1]);
        }


        print_r($request->all());
    }
}
