<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Celke</title>
</head>
<body>
    <h1>Listar cursos</h1>
        <a href="{{ route('course.index') }}">Listar cursos</a><br>
        <a href="{{ route('course.show') }}">Visualizar curso</a><br>
        <a href="{{ route('course.create') }}">Cadastrar curso</a><br>
        <a href="{{ route('course.edit') }}">Editar curso</a><br>
        <a href="{{ route('course.destroy') }}">Apagar curso</a><br>
    
</body>
</html>