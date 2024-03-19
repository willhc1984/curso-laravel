<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Celke</title>
</head>
<body>
    <h1>Editar curso</h1>

        <a href="{{ route('course.index') }}">Listar cursos</a><br>
        <a href="{{ route('course.create') }}">Cadastrar curso</a><br><br>
        <a href="{{ route('course.show', ['course' => $course->id]) }}">Visualizar</a><br>

        <form action="{{ route('course.update', ['course' => $course->id]) }}" method="POST">
            @csrf
            @method('PUT')

            <label>Nome:</label>
            <input type="text" name="name" id="name" value="{{ old('name', $course->name) }}" 
                placeholder="Nome do curso" required><br><br>
            <button type="submit">Salvar</button>

        </form>
        
       
</body>
</html>