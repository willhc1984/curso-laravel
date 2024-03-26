<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Celke</title>
</head>
<body>

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
            ->format('d/m/Y H:i:s') }} <br>

    </body>
</html>