@extends('layouts.app')

@section('content')

<div class="d-flex justify-content-end mb-2">
    <a href="{{ route('posts.create') }}" class="btn btn-success text-white">Adicionar Posts</a>
</div>

<div class="card">
    <div class="card-header">Posts</div>
    <div class="card-body">
        @if ($posts->count() > 0)       
        <table class="table">
            <thead class="thead-light">
                <tr>
                    <th>Imagem</th>
                    <th>Título</th>
                    <th colspan="2">Categoria</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($posts as $post)
                <tr>
                    <td><img class="img-thumbnail" src="{{ asset('storage/' .$post->image) }}" alt="" width="80"></td>
                    <td>{{ $post->title }}</td>
                    <td><a href="{{ route('categorias.edit', $post->category->id) }}">{{ $post->category->name }}</a></td>
                    <td class="d-flex justify-content-end">
                        @if ($post->trashed())
                        <form method="post" action="{{ route('restaurar-post', $post->id) }}">
                            @csrf
                            @method('PUT')
                            <button class="btn btn-success btn-sm text-white" type="submit">restaurar post</button>
                        </form>
                        
                        @else
                        <a href="{{ route('posts.edit', $post->id) }}" class="btn btn-info btn-sm text-white">Editar</a>
                        @endif
                        <form method="POST" action="{{ route('posts.destroy', $post->id) }}">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-danger btn-sm ml-1"
                                type="submit">{{ ($post->trashed() ? 'Excluir Permantemente' : 'Deletar') }}</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
        @else
        <h3 class="text-center text-white bg-info p-4">Não Existem posts no momento</h3>
        @endif
    </div>
</div>
@endsection