@extends('layouts.admin')
@section('content')

<div class="container-fluid px-4">
        <div class="mb1 space-between-elements">
            <h2 class="mt-3">Aulas de {{ $course->name }}</h2>
            <ol class="breadcrumb mb-3 mt-3">
                <li class="breadcrumb-item"><a href="/dashboard">Dashboard</a></li>
                <li class="breadcrumb-item"><a href="{{ route('course.index') }}">Cursos</a></li>
                <li class="breadcrumb-item active">Cursos</li>
            </ol>            
        </div>

        <div class="card mb-4 border-light shadow">
            <div class="card-header space-between-elements">
                <span>Listar</span>
                <span>
                    <a href="{{ route('classe.create',  ['course' => $course->id]) }}" class="btn btn-success btn-sm">
                    <i class="fa-solid fa-square-plus"></i> Cadastrar</a>
                </span>
            </div>

            <div class="card-body">
               
                <x-alert /> 

                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Nome</th>
                            <th scope="col" class="d-none d-md-table-cell">Descrição</th>
                            <th scope="col">Curso</th>
                            <th scope="col"  class="d-none d-md-table-cell">Ordem</th>
                            <th scope="col">Ações</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($classes as $classe)
                            <tr>
                                <th scope="row">{{ $classe->id }}</th>
                                <td>{{ $classe->name }}</td>
                                <td  class="d-none d-md-table-cell">{{ $classe->descricao }}</td>
                                <td>{{ $classe->course->name }}</td>
                                <td  class="d-none d-md-table-cell">{{ $classe->order_classe }}</td>
                                <td class="d-flex justify-content-center">                                
                                    <a href="{{ route('classe.show', ['classe' => $classe->id]) }}" class="btn btn-secondary btn-sm me-1 mb-1">
                                        <i class="fa-solid fa-magnifying-glass"></i> Visualizar</a>
                                    <a href="{{ route('classe.edit', ['classe' => $classe->id]) }}" class="btn btn-primary btn-sm me-1 mb-1">
                                        <i class="fa-solid fa-pen-to-square"></i> Editar</a>
                                        <form method="POST" action="{{ route('classe.destroy', ['classe' => $classe->id]) }}">
                                            @csrf
                                            @method('delete')
                                            <button class="btn btn-danger btn-sm me-1 mb-1" type="submit" onclick="return confirm('Tem certeza que desja excluir este registro?')">
                                                <i class="fa-solid fa-trash-can"></i> Apagar</button>
                                        </form>                               
                                </td>
                            </tr>
                        @empty
                            <div class="alert alert-danger" role="alert">
                                Nenhuma aula encontrada!
                            </div>
                        @endforelse
                    </tbody>
                </table>

                <nav aria-label="Page navigation example">
                    
                </nav>

            </div>
        </div>

    </div>
    
@endsection