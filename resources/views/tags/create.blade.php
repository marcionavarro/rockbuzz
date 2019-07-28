@extends('layouts.app')

@section('content')
<div class="card">
    <div class="card-header">{{ (isset($tag) ? 'Editar Tag' : 'Criar Tag') }}</div>
    <div class="card-body">
        @include('includes.errors')

        <form action="{{ (isset($tag) ? route('tags.update', $tag->id) : route('tags.store')) }}" method="post">
            @csrf

            @if (isset($tag))
            @method('PUT')
            @endif

            <div class="form-group">
                <label for="name">Nome</label>
                <input id="name" class="form-control" type="text" name="name"
                    value="{{ (isset($tag) ? $tag->name : '') }}">
            </div>

            <div class="form-group">
                <button class="btn btn-success"
                    type="submit">{{ (isset($tag) ? 'Atualizar Tag' : 'Adicionar Tag') }}</button>
            </div>
        </form>
    </div>
</div>
@endsection