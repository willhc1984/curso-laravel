@extends('layouts.admin')

@section('content')

    <h1>Editar curso</h1>

        <a href="{{ route('course.index') }}">
            <button type="button">Listar cursos</button>
        </a><br>
        <a href="{{ route('course.create') }}">
            <button type="button">Cadastrar curso</button>
        </a><br>
        <a href="{{ route('course.edit', ['course' => $course->id]) }}">
            <button type="button">Editar curso</button>
        </a><br>

        <form method="POST" action="{{ route('course.destroy', ['course' => $course->id]) }}">
            @csrf
            @method('delete')
            <button type="submit" onclick="return confirm('Tem certeza que deseja excluir este registro?')">Apagar</button>
        </form><br>

        <form action="{{ route('course.update', ['course' => $course->id]) }}" method="POST">
            @csrf
            @method('PUT')

            <label>Nome:</label>
            <input type="text" name="name" id="name" value="{{ old('name', $course->name) }}" 
                placeholder="Nome do curso" required><br><br>
            <label>Preço:</label>
            <input type="text" name="price" id="price" value="{{ old('price', $course->price) }}"
                placeholder="Preço do curso" required><br><br>
            <button type="submit">Salvar</button>
        </form><br>        
       
@endsection