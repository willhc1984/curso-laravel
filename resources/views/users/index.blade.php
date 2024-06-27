@extends('layouts.admin')

@section('content')
    <div class="container-fluid px-4">
        <div class="mb1 space-between-elements">
            <h2 class="mt-3">Usuários</h2>
            <ol class="breadcrumb mb-3 mt-3 p-1 rounded bg-light">
                <li class="breadcrumb-item"><a class="text-decoration-none" href="/dashboard">Dashboard</a></li>
                <li class="breadcrumb-item active">Usuários</li>
            </ol>
        </div>

        <div class="card mb-4 border-light shadow">
            <div class="card-header space-between-elements">
                <span>Pesquisar</span>
            </div>
            <div class="card-body">
                <form action="{{ route('user.index') }}">
                    <div class="row">
                        <div class="col-md-6 col-sm-12">
                            <label class="form-label" for="name">Nome:</label>
                            <input type="text" name="name" id="name" class="form-control"
                                value="{{ $name }}" placeholder="Nome do usuário">
                        </div>
                        <div class="col-md-6 col-sm-12">
                            <label class="form-label" for="email">E-mail:</label>
                            <input type="text" name="email" id="email" class="form-control"
                                value="{{ $email }}" placeholder="E-mail do usuário">
                        </div>
                        <div class="col-md-6 col-sm-12">
                            <label class="form-label" for="data_cadastro_inicio">Data inicial:</label>
                            <input type="datetime-local" name="data_cadastro_inicio" id="data_cadastro_inicio"
                                class="form-control" value="{{ $data_cadastro_inicio }}" placeholder="Data inicial">
                        </div>
                        <div class="col-md-6 col-sm-12">
                            <label class="form-label" for="data_cadastro_fim">Data final:</label>
                            <input type="datetime-local" name="data_cadastro_fim" id="data_cadastro_fim"
                                class="form-control" value="{{ $data_cadastro_fim }}" placeholder="Data final">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4 col-sm-12 mt-2 pt-2">
                            <button type="submit" class="btn btn-info btn-sm"><i class="fa-solid fa-magnifying-glass">
                                </i> Pesquisar</button>
                            <a href="{{ route('user.index') }}" class="btn btn-warning btn-sm"><i
                                    class="fa-solid fa-trash"></i>Limpar</a>
                        </div>
                    </div>
                </form>
            </div>
        </div>

        <div class="card mb-4 border-light shadow">
            <div class="card-header space-between-elements">
                <span>Listar</span>
                <span>
                    @can('create-user')
                        <a href="{{ route('user.create') }}" class="btn btn-success btn-sm">
                            <i class="fa-solid fa-square-plus"></i> Cadastrar</a>
                    @endcan
                    <a href="{{ route('user.generate-pdf') }}" class="btn btn-warning btn-sm">
                        <i class="fa-solid fa-file-pdf"></i> Gerar PDF</a>
                </span>
            </div>

            <div class="card-body">

                <x-alert />

                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Nome</th>
                            <th scope="col">Email</th>
                            <th class="text-center" scope="col">Ações</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($users as $user)
                            <tr>
                                <th scope="row">{{ $user->id }}</th>
                                <td>{{ $user->name }}</td>
                                <td>{{ $user->email }}</td>
                                <td class="d-md-flex justify-content-center">
                                    <a href="{{ route('user.show', ['user' => $user->id]) }}"
                                        class="btn btn-secondary btn-sm me-1 mb-1">
                                        <i class="fa-solid fa-magnifying-glass"></i> Visualizar</a>
                                    <a href="{{ route('user.edit', ['user' => $user->id]) }}"
                                        class="btn btn-primary btn-sm me-1 mb-1">
                                        <i class="fa-solid fa-pen-to-square"></i> Editar</a>
                                    <form method="POST" action="{{ route('user.destroy', ['user' => $user->id]) }}">
                                        @csrf
                                        @method('delete')
                                        <button class="btn btn-danger btn-sm me-1 mb-1" type="submit"
                                            onclick="return confirm('Tem certeza que desja excluir este registro?')">
                                            <i class="fa-solid fa-trash-can"></i> Apagar</button>
                                    </form>
                                </td>
                            </tr>
                        @empty
                            <div class="alert alert-danger" role="alert">
                                Nenhum usuário encontrado!
                            </div>
                        @endforelse
                    </tbody>
                </table>

                {{ $users->links() }}

            </div>
        </div>

    </div>
@endsection
