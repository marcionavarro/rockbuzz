@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Meu Perfil</div>

                <div class="card-body">
                    @include('includes.errors')

                    <form method="post" action="{{ route('users.update-profile') }}">
                        @csrf
                        @method('PUT')

                        <div class="form-group">
                            <label for="name">Nome</label>
                            <input id="name" class="form-control" type="text" name="name" value="{{ $usuario->name }}">
                        </div>

                        <div class="form-group">
                            <label for="about">Sobre Mim</label>
                            <textarea id="about" class="form-control" name="about" rows="5"
                                cols="5">{{ $usuario->about }}</textarea>
                        </div>

                        <div class="form-group">
                            <button class="btn btn-success" type="submit">Atualizar Perfil</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection