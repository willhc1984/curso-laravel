<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Celke</title>
</head>
<body>
    <h1>Cadastrar curso</h1>
        <a href="{{ route('course.index') }}">Listar cursos</a><br><br><br>

    <form action="{{ route('course.store') }}" method="POST">    
        @csrf 
        @method('POST')
        
        <label>Nome:</label>
        <input type="text" name="name" id="name" placeholder="Nome do curso" 
            required value="{{ old('name') }}" /> <br><br>
        <button type="submit">Cadastrar</button>
    </form>

</body>
</html>