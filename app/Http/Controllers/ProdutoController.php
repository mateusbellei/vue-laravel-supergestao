<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Produto;

class ProdutoController extends Controller
{
    public function index(Request $request) {
        $produtos = Produto::paginate(10);
        return view('app.produto.index',['produtos' => $produtos, 'request' => $request->all()]);
    }

    public function create() {
        echo '<h1>Criar produto</h1>';
    }

    public function store(Request $request) {
        echo '<h1>Salvar produto</h1>';
        echo '<pre>';
        print_r($request->all());
        echo '</pre>';
    }

    public function show($id) {
        echo '<h1>Mostrar produto</h1>';
        echo '<h2>ID: '.$id.'</h2>';
    }

    public function edit($id) {
        echo '<h1>Editar produto</h1>';
        echo '<h2>ID: '.$id.'</h2>';
    }

    public function update(Request $request, $id) {
        echo '<h1>Atualizar produto</h1>';
        echo '<h2>ID: '.$id.'</h2>';
        echo '<pre>';
        print_r($request->all());
        echo '</pre>';
    }

    public function destroy($id) {
        echo '<h1>Excluir produto</h1>';
        echo '<h2>ID: '.$id.'</h2>';
    }

    public function listar() {
        echo '<h1>Listar produtos</h1>';
    }

}
