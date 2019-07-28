@extends('layouts.app')

@section('content')

<div class="d-flex justify-content-end mb-2">
    <a href="{{ route('tags.create') }}" class="btn btn-success text-white">Adicionar Tag</a>
</div>

<div class="card">
    <div class="card-header">Tags</div>
    <div class="card-body">
        @if ($tags->count() > 0)
        <table class="table">
            <thead class="thead-light">
                <tr>
                    <th>Nome</th>
                    <th colspan="2">Posts</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($tags as $tag)
                <tr>
                    <td>{{ $tag->name }}</td>
                    <td>{{ $tag->posts->count() }}</td>
                    
                    <td class="d-flex justify-content-end">
                        <a href="{{ route('tags.edit', $tag->id) }}"
                            class="btn btn-info btn-sm text-white">Editar</a>

                        <button class="btn btn-danger btn-sm ml-1"
                            onclick="Delete({{ $tag->id }})">Deletar</button>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
        @else
        <h3 class="text-center text-white bg-info p-4">Não Existem tags no momento</h3>          
        @endif
    </div>
</div>

<form action="" method="post" id="deleteCategoryForm">
    @csrf
    @method('DELETE')
    <!-- Modal -->
    <div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="deleteModelLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="deleteModelLabel">Deletar tag</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <p class="text-bold">Tem certeza que deseja excluir a tag
                        <small class="text-danger">{{ (!empty($tag->name) ? $tag->name : '') }}</small> ?
                    </p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                    <button type="submit" class="btn btn-danger">Deletar</button>
                </div>
            </div>
        </div>
    </div>
</form>
@endsection

@section('scripts')
<script>
    function Delete(id){
        var form = document.getElementById('deleteCategoryForm');
        var url = window.location.href;
        form.action = url + '/' + id;

        $('#deleteModal').modal().show();
    }
</script>
@endsection