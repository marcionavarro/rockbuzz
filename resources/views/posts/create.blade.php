@extends('layouts.app')

@section('content')
<div class="card">
    <div class="card-header">
        Criar Posts
    </div>
    <div class="card-body">
        @if ($errors->any())
        <div class="alert alert-danger" role="alert">
            <ul class="list-group">
                @foreach ($errors->all() as $error)
                <li class="list-group-item text-danger">{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        @endif


        <form method="post" action="{{ route('posts.store') }}" enctype="multipart/form-data">
            @csrf

            <div class="form-group">
                <label for="image">Enviar Imagem:</label>
                <input id="image" class="form-control p-1" type="file" name="image">
            </div>

            <div class="form-group">
                <label for="title">Título</label>
                <input id="title" class="form-control" type="text" name="title">
            </div>

            <div class="form-group">
                <label for="description">Descrição</label>
                <textarea id="description" class="form-control" name="description" rows="2"></textarea>
            </div>

            <div class="form-group">
                <label for="content">Conteudo</label>
                <textarea id="content" class="form-control" name="content" rows="5"></textarea>
            </div>

            <div class="form-group">
                <label for="published_at">Publicado Em:</label>
                <input id="published_at" class="form-control" type="text" name="published_at">
            </div>

            <div class="form-group">
                <button type="submit" class="btn btn-success">Cadastrar Post</button>
            </div>

        </form>
    </div>
</div>
@endsection