<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\SiteContato;
use App\MotivoContato;

class ContatoController extends Controller
{
    public function contato(Request $request) {

        $motivo_contatos = MotivoContato::all();

        return view('site.contato', ['titulo' => 'Contato (teste)', 'motivo_contatos' => $motivo_contatos]);
    }

    public function salvar(Request $request) {

        //realizar a validação dos dados do formulário recebidos no request
        $request->validate(
            [
                'nome' => 'required|min:3|max:40',
                'telefone' => 'required',
                'email' => 'email|unique:site_contatos',
                'motivo_contatos_id' => 'required',
                'mensagem' => 'required|max:2000'
            ],
        //mensagens de erro por regras
            [
                'nome.required' => 'O campo nome é obrigatório',
                'nome.min' => 'O campo nome deve ter no mínimo 3 caracteres',
                'nome.max' => 'O campo nome deve ter no máximo 40 caracteres',
                'telefone.required' => 'O campo telefone é obrigatório',
                'email.email' => 'O campo email deve ser um email válido',
                'email.unique' => 'O email informado já está cadastrado',
                'motivo_contatos_id.required' => 'O campo motivo de contato é obrigatório',
                'mensagem.required' => 'O campo mensagem é obrigatório',
                'mensagem.max' => 'O campo mensagem deve ter no máximo 2000 caracteres'
            ]
    );
        SiteContato::create($request->all());
        return redirect()->route('site.index')->with('success', 'Mensagem enviada com sucesso!');
    }
}
