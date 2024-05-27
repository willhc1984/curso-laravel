@extends('layouts.admin')
@section('content')

<div class="container-fluid px-4">
        <div class="mb-1 space-between-elements">
            <h2 class="mt-3">Curso</h2>
            <ol class="breadcrumb mb-3 mt-3">
                <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
                <li class="breadcrumb-item"><a href="{{ route('course.index') }}">Cursos</a></li>
                <li class="breadcrumb-item active">Curso</li>
            </ol>
        </div>

        <div class="card mb-4">
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

                @if(session('success'))
                    <div class="alert alert-success" role="alert">
                        {{ session('success') }}
                    </div>
                @endif

                @if(session('error'))
                    <div class="alert alert-danger" role="alert">
                        {{ session('error') }}
                    </div>
                @endif

                <form action="{{ route('classe.update', ['classe' => $classe->id]) }}" method="POST">    
                    @csrf 
                    @method('PUT')
                    
                    <label>Nome da aula:</label>
                    <input type="text" name="name" id="name" placeholder="Nome da aula" 
                        required value="{{ old('name', $classe->name) }}" /> <br><br>
                    <label>Descrição:</label>
                    <input type="text" name="descricao" id="descricao" 
                        required value="{{ old('descricao', $classe->descricao) }}"><br><br>
                    <button type="submit">Salvar</button>
                    
                </form>  
                
            </div>
        </div>
    </div>

   
       
@endsection