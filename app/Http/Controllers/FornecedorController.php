<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Fornecedor;

class FornecedorController extends Controller
{
    public function index() {
        return view('app.fornecedor.index');
    }

    public function listar(Request $request) {

        $fornecedores = Fornecedor::where('nome', 'like', '%'.$request->input('nome').'%')
            ->where('site', 'like', '%'.$request->input('site').'%')
            ->where('uf', 'like', '%'.$request->input('uf').'%')
            ->where('email', 'like', '%'.$request->input('email').'%')
            ->get();
            

        return view('app.fornecedor.listar', ['fornecedores' => $fornecedores]);

    }

    public function adicionar(Request $request) {

        $msgSucess = '';

        //inclusão
        if($request->input('_token') != '' && $request->input('id') == '') {
            //validacao de dados
            $regras = [
                'nome' => 'required|min:3|max:100',
                'site' => 'required|min:3|max:100',
                'uf' => 'required|min:2|max:2',
                'email' => 'email|required|min:3|max:100',
            ];

            //mensagens de erro
            $feedback = [
                'required' => 'O campo :attribute é obrigatório.',
                'min' => 'O campo :attribute deve ter no mínimo :min caracteres.',
                'max' => 'O campo :attribute deve ter no máximo :max caracteres.',
                'email.email' => 'O campo :attribute deve ser um e-mail válido.',
            ];

            $request->validate($regras, $feedback);

            $fornecedor = new Fornecedor();
            $fornecedor->create($request->all());

            //dados view
            $msgSucess = 'Fornecedor cadastrado com sucesso.';

        }

        //editando
        if($request->input('_token') != '' && $request->input('id') != '') {
            $fornecedor = Fornecedor::find($request->input('id'));
            $update = $fornecedor->update($request->all());

            if($update) {
                $msgSucess = 'Fornecedor editado com sucesso.';
            } else {
                $msgSucess = 'Erro ao editar fornecedor.';
            }
            return redirect()->route('app.fornecedor.editar', ['id' => $request->input('id'), 'msgSucess' => $msgSucess] );
        }

        return view('app.fornecedor.adicionar', ['msgSucess' => $msgSucess]);
        
    }

    public function editar($id, $msgSucess = '') {
    
        $fornecedor = Fornecedor::find($id);

        return view('app.fornecedor.adicionar', ['fornecedor' => $fornecedor, 'msgSucess' => $msgSucess]);


    }
}
