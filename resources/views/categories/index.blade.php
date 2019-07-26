@extends('layouts.app')

@section('content')

<div class="d-flex justify-content-end mb-2">
    <a href="{{ route('categorias.create') }}" class="btn btn-success text-white">Adicionar Categoria</a>
</div>

<div class="card">
    <div class="card-header">Categorias</div>
    <div class="card-body">
        <table class="table">
            <thead class="thead-light">
                <tr>
                    <th colspan="4">Nome</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($categorias as $categoria)
                <tr>
                    <td>{{ $categoria->name }}</td>
                    <td class="d-flex justify-content-end">
                        <a href="{{ route('categorias.edit', $categoria->id) }}"
                            class="btn btn-info btn-sm text-white">Editar</a>

                        <button class="btn btn-danger btn-sm ml-1"
                            onclick="Delete({{ $categoria->id }})">Deletar</button>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
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
                    <h5 class="modal-title" id="deleteModelLabel">Deletar Categoria</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <p class="text-bold">Tem certeza que deseja excluir a categoria
                        <small class="text-danger">{{ (!empty($categoria->name) ? $categoria->name : '') }}</small> ?
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