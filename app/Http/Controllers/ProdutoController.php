<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Produto;
use App\Unidade;

class ProdutoController extends Controller
{
    public function index(Request $request) {
        $produtos = Produto::paginate(10);
        return view('app.produto.index',['produtos' => $produtos, 'request' => $request->all()]);
    }

    public function create() {
        $unidades = Unidade::all();
        return view('app.produto.create',['unidades' => $unidades]);
    }

    public function store(Request $request) {
        $regras = [
            'nome' => 'required|min:3|max:100',
            'descricao' => 'required|min:3|max:255',
            'peso' => 'required|integer',
            'unidade_id' => 'exists:unidades,id',
        ];
        $feedback = [
            'required' => 'O campo :attribute é obrigatório.',
            'min' => 'O campo :attribute deve ter no mínimo :min caracteres.',
            'max' => 'O campo :attribute deve ter no máximo :max caracteres.',
            'integer' => 'O campo :attribute deve ser numérico.',
            'mimes' => 'O campo :attribute deve ser uma imagem do tipo :values.',
            'max' => 'O campo :attribute deve ter no máximo :max kilobytes.',
            'exists' => 'A unidade não existe.',
        ];
        
        $request->validate($regras, $feedback);

        Produto::create($request->all());
        return redirect()->route('produto.index');
    }

    public function show(Produto $produto) {
        return view('app.produto.show',['produto' => $produto]);
    }

    public function edit(Produto $produto) {
        $unidades = Unidade::all();
        return view ('app.produto.edit',['produto' => $produto, 'unidades' => $unidades]);
    }

    public function update(Request $request, Produto $produto) {
        $produto->update($request->all());
        return redirect()->route('produto.index');
    }

    public function destroy($id) {
        echo '<h1>Excluir produto</h1>';
        echo '<h2>ID: '.$id.'</h2>';
    }

    public function listar() {
        echo '<h1>Listar produtos</h1>';
    }

}
