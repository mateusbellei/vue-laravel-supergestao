@extends('app.layouts.basico')

@section('titulo', 'Produto')

@section('conteudo')
    <div class="conteudo-pagina">
        <div class="titulo-pagina">
            <h1>Listagem de Produtos</h1>
        </div>

        <div class="menu">
            <ul>
                <li><a href="">Novo</a></li>
                <li><a href="">Consulta</a></li>
            </ul>
        </div>

        <div class="informacao-pagina">
            <div style="width:90%; margin-left: auto; margin-right: auto;">
                <table border="1" width="100%">
                    <thead>
                        <tr>
                            <th>Nome</th>
                            <th>Descrição</th>
                            <th>Peso</th>
                            <th>Unidade</th>
                            <th></th>
                            <th></th>
                        </tr>
                    </thead>

                    <tbody>
                        @foreach($produto as $produto)
                            <tr>
                                <td>{{$produto->nome}}</td>
                                <td>{{$produto->descricao}}</td>
                                <td>{{$produto->peso}}</td>
                                <td>{{$produto->unidade_id}}</td>
                                <td><a href="">Editar</a></td>
                                <td><a href="">Excluir</a></td>
                            </tr>
                        @endforeach
                    </tbody>               
                </table>
                {{ $produtos->appends($request)->links() }}
                <br>
                Exibindo {{ $produtos->count() }} registros de {{ $produtos->total() }} registros encontrados.
                <br>
                Posição {{ $produtos->firstItem() }} a {{ $produtos->lastItem() }}
            </div>
        </div>
    </div>
@endsection