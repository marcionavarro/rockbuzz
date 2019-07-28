@extends('layouts.app')

@section('content')
<div class="card">
    <div class="card-header">
        {{ (isset($post) ? 'Editar Post' : 'Criar Post') }}
    </div>
    <div class="card-body">
<<<<<<< HEAD
        @include('includes.errors')
=======
        @if ($errors->any())
        <div class="alert alert-danger" role="alert">
            <ul class="list-group">
                @foreach ($errors->all() as $error)
                <li class="list-group-item text-danger">{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        @endif

>>>>>>> 1f09d741f781ba55fcfffb590b7b2fd7669c2a4e

        <form method="post" action="{{ (isset($post) ? route('posts.update', $post->id) : route('posts.store')) }}"
            enctype="multipart/form-data">
            @csrf
            @if (isset($post))
            @method('PUT')
            @endif

            <div class="form-group">
                <img src="{{ (isset($post) ? asset('storage/' . $post->image) : '') }}" alt="" class="mb-3 mr-2"
                    style="width:10%">
                <label for="image">Enviar Imagem:</label>
                <input id="image" class="form-control p-1" type="file" name="image">
            </div>

            <div class="form-group">
                <label for="title">Título</label>
                <input id="title" class="form-control" type="text" name="title"
                    value="{{ (isset($post) ? $post->title : '') }}">
            </div>

            <div class="form-group">
                <label for="description">Descrição</label>
                <textarea id="description" class="form-control" name="description"
                    rows="2">{{ (isset($post) ? $post->description : '') }}</textarea>
            </div>


            <div class="form-group">
                <label for="content">Conteudo</label>
                <input id="content" type="hidden" name="content" value="{{ (isset($post) ? $post->content : '') }}">
                <trix-editor input="content"></trix-editor>
            </div>

            <div class="form-row">
                <div class="form-group col-6">
                    <label for="category">Categorias:</label>
                    <select id="category" class="form-control" name="category">
                        <option value="">Selecione uma Categoria</option>
                        @foreach ($categorias as $categoria)
                        <option value="{{ $categoria->id }}"
                            {{ (isset($post) ? ($categoria->id == $post->category_id ? 'selected' : '') : '') }}>
                            {{ $categoria->name }}
                        </option>
                        @endforeach
                    </select>
                </div>


                <div class="form-group col-6">
                    <label for="tags">Tags:</label>
                    @if ($tags->count() > 0)
                    <select id="tags" class="form-control tags-selector" name="tags[]" multiple>
                        @foreach ($tags as $tag)
                        <option value="{{ $tag->id }}" @if (isset($post)) @if ($post->hasTag($tag->id))
                            selected
                            @endif
                            @endif>

                            {{ $tag->name }}
                        </option>
                        @endforeach
                    </select>
                    @else
                    <p class="text-center text-white bg-info mx-4 p-1">não existem tags no momento</p>
                    @endif
                </div>
            </div>

            <div class="form-group">
                <label for="category">Categoria</label>
                <select id="category" class="form-control" name="category">
                    <option value="">Escolha uma categoria</option>
                    @foreach ($categorias as $categoria)
                    <option value="{{ ($categoria->id) }}"
                        {{ (isset($post) ? ($categoria->id == $post->category_id ? 'selected' : '') : '') }}>
                        {{ $categoria->name }}
                    </option>
                    @endforeach
                </select>
            </div>

            <div class="form-group">
                <label for="published_at">Publicar Em:</label>
                <input id="published_at" class="form-control" type="text" name="published_at"
                    value="{{ (isset($post) ? $post->published_at : '') }}">
            </div>

            <div class="form-group">
                <button type="submit"
                    class="btn btn-success">{{ (isset($post) ? 'Editar Post' : 'Cadastrar Post') }}</button>
            </div>

        </form>
    </div>
</div>
@endsection

@section('css')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/trix/1.1.1/trix.css">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
<link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.7/css/select2.min.css" rel="stylesheet" />
@endsection

@section('scripts')
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.7/js/select2.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/trix/1.1.1/trix.js"></script>
<script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
<script src="https://npmcdn.com/flatpickr/dist/l10n/pt.js"></script>
<script>
    flatpickr('#published_at', {
        enableTime: true,
        locale: 'pt'
    });

    $(document).ready(function() {
        $('.tags-selector').select2();
    });
</script>
@endsection