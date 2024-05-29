@extends('layouts.admin')

@section('content')

    <div class="container-fluid px-4">
        <div class="mb1 space-between-elements">
            <h2 class="mt-3">Dashboard</h2>
            <ol class="breadcrumb mb-3 mt-3">
                <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
                <li class="breadcrumb-item active">Cursos</li>
            </ol>            
        </div>

        <div class="card mb-4 border-light shadow">
            <div class="card-header space-between-elements">
                <span>Listar</span>
                <span>
                    <a href="{{ route('course.create') }}" class="btn btn-success btn-sm">
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
                            <th scope="col" class="d-none d-md-table-cell">Preço</th>
                            <th scope="col">Ações</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($courses as $course)
                            <tr>
                                <th scope="row">{{ $course->id }}</th>
                                <td>{{ $course->name }}</td>
                                <td class="d-none d-md-table-cell">{{ 'R$ ' . number_format($course->price, 2, ',', '.') }}</td>
                                <td class="d-md-flex justify-content-center">                                
                                    <a href="{{ route('classe.index', ['course' => $course->id]) }}" class="btn btn-info btn-sm me-1 mb-1">
                                        <i class="fa-solid fa-list-check"></i> Aulas</a>
                                    <a href="{{ route('course.show', ['course' => $course->id]) }}" class="btn btn-secondary btn-sm me-1 mb-1">
                                        <i class="fa-solid fa-magnifying-glass"></i> Visualizar</a>
                                    <a href="{{ route('course.edit', ['course' => $course->id]) }}" class="btn btn-primary btn-sm me-1 mb-1">
                                        <i class="fa-solid fa-pen-to-square"></i> Editar</a>
                                        <form method="POST" action="{{ route('course.destroy', ['course' => $course->id]) }}">
                                            @csrf
                                            @method('delete')
                                            <button class="btn btn-danger btn-sm me-1 mb-1" type="submit" onclick="return confirm('Tem certeza que desja excluir este registro?')">
                                                <i class="fa-solid fa-trash-can"></i> Apagar</button>
                                        </form>                               
                                </td>
                            </tr>
                        @empty
                            <div class="alert alert-danger" role="alert">
                                Nenhum curso encontrado!
                            </div>
                        @endforelse
                    </tbody>
                </table>

                {{ $courses->links() }}         

            </div>
        </div>

    </div>

@endsection