@extends('app.layouts.basico')

@section('titulo', 'Produtos')

@section('conteudo')
    <div class="conteudo-pagina">
        
        <div class="titulo-pagina">
            <h1>Produto - Adicionar</h1>
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
                @component('app.produto._components.form_create_edit', ['unidades' => $unidades])
                @endcomponent
            </div>
        </div>
    </div>
@endsection