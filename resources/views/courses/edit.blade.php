@extends('layouts.admin')

@section('content')

<div class="container-fluid px-4">
        <div class="mb-1 space-between-elements">
            <h2 class="mt-3">Curso</h2>
            <ol class="breadcrumb mb-3 mt-3">
                <li class="breadcrumb-item"><a href="/dashboard">Dashboard</a></li>
                <li class="breadcrumb-item"><a href="{{ route('course.index') }}">Cursos</a></li>
                <li class="breadcrumb-item active">Curso</li>
            </ol>
        </div>
        
        <div class="card mb-4 border-light shadow">
            <div class="card-header space-between-elements">
                <span>Editar</span>
                <span class="d-flex">
                    <a href="{{ route('course.index') }}" class="btn btn-info btn-sm me-1"><i
                            class="fa-solid fa-list"></i> Listar</a>

                    <a href="{{ route('course.show', ['course' => $course->id]) }}" class="btn btn-secondary btn-sm me-1"><i
                            class="fa-solid fa-magnifying-glass"></i>Visualizar
                    </a>

                    <form method="POST" action="{{ route('course.destroy', ['course' => $course->id]) }}">
                        @csrf
                        @method('delete')
                        <button type="submit" class="btn btn-danger btn-sm me-1"
                            onclick="return confirm('Tem certeza que deseja apagar este registro?')"><i
                                class="fa-regular fa-trash-can"></i> Apagar</button>
                    </form>
                </span>
            </div>

            <div class="card-body">
                
                <x-alert /> 

                <form class="row g-3" action="{{ route('course.update', ['course' => $course->id]) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="col-12">
                        <label for="name" class="form-label">Nome:</label>
                        <input type="text" class="form-control" name="name" id="name" value="{{ old('name', $course->name) }}" 
                            placeholder="Nome do curso" >
                    </div>
                    <div class="col-12">
                        <label  for="price">Preço:</label>
                        <input type="text" class="form-control" name="price" id="price" value="{{ old('price', $course->price) }}"
                            placeholder="Preço do curso" >
                    </div>
                    <div class="col-12">
                        <button type="submit" class="btn btn-warning bt-sm">Salvar</button>
                    </div>
                </form>                
            </div>
        </div>
    </div>       
       
    <script src="{{ asset('js/script.js') }}"></script>
    
@endsection