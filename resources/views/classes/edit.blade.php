@extends('layouts.admin')
@section('content')

    <h1>Editar aula</h1>

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
       
@endsection