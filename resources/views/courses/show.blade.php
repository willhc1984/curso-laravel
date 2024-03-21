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
        <a href="{{ route('course.create') }}">
            <button type="button">Cadastrar curso</button>
        </a><br>
        <a href="{{ route('course.edit', ['course' => $course->id]) }}">
            <button type="button">Editar curso</button>
        </a><br>

        <form method="POST" action="{{ route('course.destroy', ['course' => $course->id]) }}">
            @csrf
            @method('delete')
            <button type="submit" onclick="return confirm('Tem certeza que desja excluir este registro?')">Apagar</button>
        </form>

        @if(session('success'))
            <p style="color: #082">
                {{ session('success') }}
            </p>
        @endif

        <h1>Detalhes do curso</h1>

        ID: {{ $course->id }} <br>
        Nome: {{ $course->name }} <br>
        Preço: {{ 'R$ ' .number_format($course->price, 2, ',', '.') }} <br>
        Data do cadastro: {{ \Carbon\Carbon::parse($course->created_at)->tz('America/Sao_paulo')
                ->format('d/m/Y H:i:s') }} <br>
        Editado: {{ \Carbon\Carbon::parse($course->updated_at)->tz('America/Sao_paulo')
            ->format('d/m/Y H:i:s') }} <br>

    </body>
</html>