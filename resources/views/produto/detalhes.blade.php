@extends('layout.principal') @section('conteudo')
<h1 class="text-center">Detalhes do produto {{ $p->nome }}</h1>
<ul>
    <li>
        <b>Valor:</b> R$ {{ $p->valor }}
    </li>
    <li>
        <b>Descrição:</b> {{ $p->descricao or 'nenhuma descrição encontrada'}}
    </li>
    <li>
        <b>Quantidade em estoque:</b> {{ $p->quantidade }}
    </li>
</ul>
@stop