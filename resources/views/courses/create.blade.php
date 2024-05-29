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

        <div class="card mb-4 border-light shadow">
            <div class="card-header space-between-elements">
                <span>Cadastrar</span>
                <span>
                    <a href="{{ route('course.index') }}" class="btn btn-success btn-sm">
                    <i class="fa-solid fa-square-plus"></i> Listar</a>
                </span>
            </div>

            <div class="card-body">

                <x-alert />          

                <form class="row g-3" action="{{ route('course.store') }}" method="POST">
                    @csrf
                    @method('POST')
                    <div class="col-12">
                        <label for="name" class="form-label">Nome:</label>
                        <input type="text" class="form-control" name="name" id="name" value="{{ old('name') }}" 
                            placeholder="Nome do curso" >
                    </div>
                    <div class="col-12">
                        <label  for="price">Preço:</label>
                        <input type="text" class="form-control" name="price" id="price" value="{{ old('price') }}"
                            placeholder="Preço do curso" >
                    </div>
                    <div class="col-12">
                        <button type="submit" class="btn btn-primary bt-sm">Salvar</button>
                    </div>
                </form>                
            </div>
        </div>        
    </div>

    <script src="{{ asset('js/script.js') }}"></script>

@endsection
