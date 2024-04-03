@extends('layouts.admin')

@section('content')

    <h1>Cadastrar aula</h1>
        <a href="{{ route('course.index') }}">Listar cursos</a><br><br><br>

        @if(session('error'))
            <p style="color: #f00">
                {{ session('error') }}
            </p>
        @endif

    <form action="{{ route('classe.store') }}" method="POST">    
        @csrf 
        @method('POST')

        <input type="hidden" name="course_id" id="course_id" value="{{ $course->id }}">
        
        <label>Nome da aula:</label>
        <input type="text" name="name" id="name" placeholder="Nome da aula" 
            required value="{{ old('name') }}" /> <br><br>
        <label>Descrição:</label>
        <input type="text" name="descricao" id="descricao">{{ old('descricao')}}<br><br>
        <button type="submit">Cadastrar</button>
        
    </form>

@endsection
