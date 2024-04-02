<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Celke</title>
</head>
<body>
    <h1>Listar aulas</h1>

        <a href="{{ route('course.index') }}">
            <button type="button">Cursos</button>    
        </a>
        <a href="{{ route('classe.create', ['course' => $course->id ]) }}">
            <button type="button">Cadastrar aula</button>    
        </a>

        @if(session('success'))
            <p style="color: #082">
                {{ session('success') }}
            </p>
        @endif

        <h1>Aulas cadastradas:</h1>

        @forelse($classes as $classe)
            ID da aula: {{ $classe->id }} <br>
            Nome da aula: {{ $classe->name }} <br>
            Nome do curso: {{ $classe->course->name }} <br>
            Ordem: {{ $classe->order_classe }} <br>
            Descrição: {{ $classe->descricao }} <br>
            Data do cadastro: {{ \Carbon\Carbon::parse($classe->created_at)->tz('America/Sao_paulo')
                ->format('d/m/Y H:i:s') }} <br>
            Editado: {{ \Carbon\Carbon::parse($classe->updated_at)->tz('America/Sao_paulo')
                ->format('d/m/Y H:i:s') }} <br>
            <br>
            <a href="{{ route('classe.show', ['classe' => $classe->id]) }}">
                <button type="button">Exibir</button>  
            </a>
            
            <a href="{{ route('classe.edit', ['classe' => $classe->id]) }}">
                <button type="button">Editar</button>    
            </a>

            <form method="POST" action="{{ route('classe.destroy', ['classe' => $classe->id]) }}">
                @csrf
                @method('delete')
                <button type="submit" onclick="return confirm('Tem certeza que deseja apagar este registro?')">
                    Apagar
                </button>
            </form>
            <hr>


        @empty
            <p style="color: red;">Nenhum aula encontrada!</p>
        @endforelse
    
</body>
</html>