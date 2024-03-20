<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Celke</title>
</head>
<body>
    <h1>Listar cursos</h1>

        @if(session('success'))
            <p style="color: #082">
                {{ session('success') }}
            </p>
        @endif
        
        <a href="{{ route('course.create') }}">Cadastrar curso</a><br>

        <h1>Cursos cadastrados:</h1>
        @forelse($courses as $course)
            ID: {{ $course->id }} <br>
            Nome: {{ $course->name }} <br>
            Data do cadastro: {{ \Carbon\Carbon::parse($course->created_at)->tz('America/Sao_paulo')
                ->format('d/m/Y H:i:s') }} <br>
            Editado: {{ \Carbon\Carbon::parse($course->updated_at)->tz('America/Sao_paulo')
                ->format('d/m/Y H:i:s') }} <br>
            <a href="{{ route('course.show', ['course' => $course->id]) }}"><button type="button">Visualizar</button></a><br>
            <a href="{{ route('course.edit', ['course' => $course->id]) }}"><button type="button">Editar</button></a><br>
            <form method="POST" action="{{ route('course.destroy', ['course' => $course->id]) }}">
                @csrf
                @method('delete')
                <button type="submit" onclick="return confirm('Tem certeza que desja excluir este registro?')">Apagar</button>
            </form>
            <hr>

        @empty
            <p style="color: red;">Nenhum curso encontrado!</p>
        @endforelse

        {{ $courses->links() }}
    
</body>
</html>