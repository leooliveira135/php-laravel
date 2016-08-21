@extends('layout.principal') @section('conteudo')

<h1 class="text-center">Novo produto</h1> @if(count($errors) > 0)
<div class="alert alert-danger">
    <ul>
        @foreach($errors->all() as $errors)
        <li>{{ $errors }}</li>
        @endforeach
    </ul>
</div>
@endif

<form action="adiciona" method="post">
    <input type="hidden" name="_token" value="{{{ csrf_token() }}}" />
    <div class="form-group">
        <label>Nome</label>
        <input class="form-control" name="nome" value="{{ old('nome') }}" />
    </div>
    <div class="form-group">
        <label>Descrição</label>
        <input class="form-control" name="descricao" value="{{ old('descricao') }}" />
    </div>
    <div class="form-group">
        <label>Valor</label>
        <input class="form-control" name="valor" value="{{ old('valor') }}" />
    </div>
    <div class="form-group">
        <label>Quantidade</label>
        <input type="number" class="form-control" name="quantidade" value="{{ old('quantidade') }}" />
    </div>
    <div class="form-group">
        <button type="submit" class="btn btn-primary btn-block">Adicionar</button>
    </div>
</form>

@stop