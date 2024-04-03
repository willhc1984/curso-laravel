@extends('layouts.admin')
@section('content')

    <a href="{{ route('course.index') }}">
        <button type="button">Listar cursos</button>
    </a><br>

    @if(session('success'))
        <p style="color: #082">
            {{ session('success') }}
        </p>
    @endif

    <h1>Detalhes da aula</h1>

    ID: {{ $classe->id }} <br>
    Nome: {{ $classe->name }} <br>
    Descrição: {{ $classe->descricao }} <br>
    Curso: {{ $classe->course->name }} <br>
    Data do cadastro: {{ \Carbon\Carbon::parse($classe->created_at)->tz('America/Sao_paulo')
            ->format('d/m/Y H:i:s') }} <br>
    Editado: {{ \Carbon\Carbon::parse($classe->updated_at)->tz('America/Sao_paulo')
        ->format('d/m/Y H:i:s') }} <br><br>
    <form method="POST" action="{{ route('classe.destroy', ['classe' => $classe->id]) }}">
        @csrf
        @method('delete')
        <button type="submit" onclick="return confirm('Tem certeza que deseja apagar este registro?')">
            Apagar
        </button>
    </form>

@endsection