@extends('layouts.app')

@section('content')
<div class="card">
    <div class="card-header">{{ (isset($categoria) ? 'Editar Categoria' : 'Criar Categoria') }}</div>
    <div class="card-body">
        @include('includes.errors')

        <form
            action="{{ (isset($categoria) ? route('categorias.update', $categoria->id) : route('categorias.store')) }}"
            method="post">
            @csrf

            @if (isset($categoria))
            @method('PUT')
            @endif

            <div class="form-group">
                <label for="name">Nome</label>
                <input id="name" class="form-control" type="text" name="name"
                    value="{{ (isset($categoria) ? $categoria->name : '') }}">
            </div>

            <div class="form-group">
                <button class="btn btn-success"
                    type="submit">{{ (isset($categoria) ? 'Atualizar Categoria' : 'Adicionar Categoria') }}</button>
            </div>
        </form>
    </div>
</div>
@endsection