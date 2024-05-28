@extends('layouts.admin')

@section('content')

<div class="container-fluid px-4">
        <div class="mb-1 space-between-elements">
            <h2 class="mt-3">Aula</h2>
            <ol class="breadcrumb mb-3 mt-3">
                <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
                <li class="breadcrumb-item"><a href="{{ route('course.index') }}">Cursos</a></li>
                <li class="breadcrumb-item active">Aula</li>
            </ol>
        </div>  

        <div class="card mb-4 border-light shadow">
            <div class="card-header space-between-elements">
                <span>Cadastrar</span>
                <span>
                    <a href="{{ route('course.index') }}" class="btn btn-success btn-sm">
                    <i class="fa-solid fa-square-plus"></i> Listar</a>
                </span>
            </div>

            <div class="card-body">
                @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
                @endif            
        
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

                <form class="row g-3" action="{{ route('classe.store') }}" method="POST">
                    @csrf
                    @method('POST')
                    <input type="hidden" name="course_id" id="course_id" value="{{ $course->id }}">
                    <div class="col-12">
                        <label for="name" class="form-label">Nome:</label>
                        <input type="text" class="form-control" name="name" id="name" value="{{ old('name') }}" 
                            placeholder="Nome da aula" >
                    </div>
                    <div class="col-12">
                        <label  for="descricao">Descrição:</label>
                        <input type="text" class="form-control" name="descricao" id="descricao" value="{{ old('descricao') }}"
                            placeholder="Descrição da aula do curso" >
                    </div>
                    <div class="col-12">
                        <button type="submit" class="btn btn-primary bt-sm">Salvar</button>
                    </div>
                </form>                
            </div>
        </div>        
    </div>

@endsection
