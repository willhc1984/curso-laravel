<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Celke</title>
</head>
<body>

        <a href="{{ route('course.index') }}">Listar cursos</a><br>
        <a href="{{ route('course.create') }}">Cadastrar curso</a><br>
        <a href="{{ route('course.edit', ['course' => $course->id]) }}">Editar curso</a><br>

        @if(session('success'))
            <p style="color: #082">
                {{ session('success') }}
            </p>
        @endif

        <h1>Detalhes do curso</h1>

        ID: {{ $course->id }} <br>
        Nome: {{ $course->name }} <br>
        Data do cadastro: {{ \Carbon\Carbon::parse($course->created_at)->tz('America/Sao_paulo')
                ->format('d/m/Y H:i:s') }} <br>
        Editado: {{ \Carbon\Carbon::parse($course->updated_at)->tz('America/Sao_paulo')
            ->format('d/m/Y H:i:s') }} <br>

    </body>
</html>