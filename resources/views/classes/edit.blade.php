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
                <span>Listar</span>
                <span class="d-flex">

                    <a href="{{ route('classe.index', ['course' => $classe->course->id]) }}" class="btn btn-info btn-sm me-1"><i
                            class="fa-solid fa-list"></i> Aulas</a>

                    <a href="{{ route('classe.edit', ['classe' => $classe->id]) }}" class="btn btn-warning btn-sm me-1"><i
                            class="fa-solid fa-pen-to-square"></i>Editar
                    </a>

                    <form method="POST" action="{{ route('classe.destroy', ['classe' => $classe->id]) }}">
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

                <form class="row g-3" action="{{ route('classe.update', ['classe' => $classe->id]) }}" method="POST">    
                    @csrf 
                    @method('PUT')
                    <div class="col-12">
                        <label for="name" class="form-label">Nome da aula:</label>
                        <input type="text" class="form-control" name="name" id="name" placeholder="Nome da aula" 
                            value="{{ old('name', $classe->name) }}" />
                    </div>
                    <div class="col-12">
                        <label for="descricao" class="form-label">Descrição:</label>
                        <input type="text" class="form-control" name="descricao" id="descricao" 
                            value="{{ old('descricao', $classe->descricao) }}">
                    </div>
                    <div class="col-12">
                        <button type="submit" class="btn btn-primary bt-sm">Salvar</button>
                    </div>
                    
                </form>  
                
            </div>
        </div>
    </div>
       
@endsection