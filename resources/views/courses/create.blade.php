@extends('layouts.admin')

@section('content')

    <h1>Cadastrar curso</h1>
        <a href="{{ route('course.index') }}">Listar cursos</a><br><br><br>

    <form action="{{ route('course.store') }}" method="POST">    
        @csrf 
        @method('POST')
        
        <label>Nome:</label>
        <input type="text" name="name" id="name" placeholder="Nome do curso" 
            value="{{ old('name') }}" /> <br><br>
        <label>Preço:</label>
        <input type="text" name="price" id="price" placeholder="Preço do curso" 
            value="{{ old('price') }}" /> <br><br>
        <button type="submit">Cadastrar</button>
    </form>

@endsection
