@extends('app.layouts.basico')

@section('titulo', 'Produtos')

@section('conteudo')
    <div class="conteudo-pagina">
        <div class="titulo-pagina">
            <h1>Produto - Visualizar</h1>
        </div>

        <div class="menu">
            <ul>
                <li><a href="{{route('produto.index')}}">Voltar</a></li>
                <li><a>Consulta</a></li>
            </ul>
        </div>

        <div class="informacao-pagina">
            {{-- {{$msgSucess ?? ''}} --}}
            <div style="width:30%; margin-left: auto; margin-right: auto;">
                <table border="1" style="text-align:start">
                    <tr>
                        <td>ID</td>
                        <td>{{$produto->id}}</td>
                    </tr>
                    <tr>
                        <td>Nome</td>
                        <td>{{$produto->nome}}</td>
                    </tr>
                    <tr>
                        <td>Descrição</td>
                        <td>{{$produto->descricao}}</td>
                    </tr>
                    <tr>
                        <td>Peso</td>
                        <td>{{$produto->peso}} Kg</td>
                    </tr>
                    <tr>
                        <td>Unidade</td>
                        <td>{{$produto->unidade_id}}</td>
                    </tr>
                </table>
            </div>
        </div>
    </div>
@endsection