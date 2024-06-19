@extends('layouts.admin')

@section('content')
    <div class="container-fluid px-4">
        <div class="mb1 space-between-elements">
            <h2 class="mt-3">Permissões do papel</h2>
            <ol class="breadcrumb mb-3 mt-3 p-1 rounded bg-light">
                <li class="breadcrumb-item"><a class="text-decoration-none" href="/dashboard">Dashboard</a></li>
                <li class="breadcrumb-item"><a class="text-decoration-none" href="{{ route('role.index') }}">Papéis</a></li>
                <li class="breadcrumb-item active">Permissões do papel</li>
            </ol>
        </div>

        <div class="card mb-4 border-light shadow">
            <div class="card-header space-between-elements">
                <span>Listar</span>
                <span>
                    @can('create-role')
                        <a href="{{ route('role.create') }}" class="btn btn-success btn-sm">
                            <i class="fa-solid fa-square-plus"></i> Cadastrar</a>
                    @endcan
                </span>
            </div>

            <div class="card-body">

                <x-alert />

                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Nome</th>
                            <th scope="col" class="text-center">Ações</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($permissions as $permission)
                            <tr>
                                <th scope="row">{{ $permission->id }}</th>
                                <td>{{ $permission->name }}</td>
                                <td class="d-md-flex justify-content-center">
                                
                                    @if (in_array($permission->id, $rolePermissions ?? []))
                                        Liberado
                                    @else
                                        Bloqueado
                                    @endif

                                </td>
                            </tr>

                        @empty
                            <div class="alert alert-danger" role="alert">
                                Nenhuma permissão para o papel!
                            </div>
                        @endforelse
                    </tbody>
                </table>

            </div>
        </div>

    </div>
@endsection
