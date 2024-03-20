<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Celke</title>
</head>
<body>
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
            <button type="submit">Salvar</button>
        </form><br>
        
       
</body>
</html>