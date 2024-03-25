<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Celke</title>
</head>
<body>
    <h1>Listar aulas</h1>

        <a href="{{ route('course.index') }}">Cursos</a>

        @if(session('success'))
            <p style="color: #082">
                {{ session('success') }}
            </p>
        @endif

        <h1>Aulas cadastradas:</h1>
        @forelse($classes as $classe)
            ID: {{ $classe->id }} <br>
            Nome: {{ $classe->name }} <br>
            Ordem: {{ $classe->order_classe }} <br>
            Descrição: {{ $classe->descricao }} <br>
            Curso: {{ $classe->course->name }} <br>
            Data do cadastro: {{ \Carbon\Carbon::parse($classe->created_at)->tz('America/Sao_paulo')
                ->format('d/m/Y H:i:s') }} <br>
            Editado: {{ \Carbon\Carbon::parse($classe->updated_at)->tz('America/Sao_paulo')
                ->format('d/m/Y H:i:s') }} <br><br>
            <br><hr>

        @empty
            <p style="color: red;">Nenhum aula encontrada!</p>
        @endforelse
    
</body>
</html>