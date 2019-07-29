@extends('layouts.app')

@section('content')
<div class="card">
    <div class="card-header">Usuários</div>
    <div class="card-body">
        @if ($usuarios->count() > 0)
        <table class="table">
            <thead class="thead-light">
                <tr>
                    <th>Imagem</th>
                    <th>Nome</th>
                    <th colspan="2">Email</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($usuarios as $usuario)
                <tr>
                    <td><img class="img-thumbnail rounded-circle border-primary" src="{{ Gravatar::src($usuario->email) }}" alt="" width="50"></td>
                    <td class="pt-4">{{ $usuario->name }}</td>
                    <td class="pt-4">{{ $usuario->email }}</td>
                    <td class="pt-4">
                        @if (!$usuario->isAdmin())
                       <form method="post" action="{{ route('users.make-admin', $usuario->id) }}">
                        @csrf
                            <button class="btn btn-success btn-sm" type="submit">Admin</button>
                       </form>
                        @endif
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
        @else
        <h3 class="text-center text-white bg-info p-4">Não Existem usuários no momento</h3>
        @endif
    </div>
</div>
@endsection