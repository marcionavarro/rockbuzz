@extends('layouts.app')

@section('content')

<div class="d-flex justify-content-end mb-2">
    <a href="{{ route('posts.create') }}" class="btn btn-success text-white">Adicionar Posts</a>
</div>

<div class="card">
    <div class="card-header">Posts</div>
    <div class="card-body">
        <table class="table">
            <thead class="thead-light">
                <tr>
                    <th>Imagem</th>
                    <th colspan="2">Título</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($posts as $post)
                <tr>
                    <td><img class="img-thumbnail" src="{{ asset('storage/' .$post->image) }}" alt="" width="80"></td>
                    <td>{{ $post->title }}</td>
                    <td class="d-flex justify-content-end">
                        @if (!$post->trashed())
                        <a href="" class="btn btn-info btn-sm text-white">Editar</a>
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
    </div>
</div>
@endsection