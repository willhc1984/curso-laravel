@extends('layouts.admin')

@section('content')

    <div class="container-fluid px-4">
        <div class="mb1 space-between-elements">
            <h2 class="mt-3">Dashboard</h2>
            <ol class="breadcrumb mb-3 mt-3">
                <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
                <li class="breadcrumb-item active">Cursos</li>
            </ol>            
        </div>

        <div class="card mb-4">
            <div class="card-header space-between-elements">
                <span>Listar</span>
                <span>
                    <a href="{{ route('course.create') }}" class="btn btn-success btn-sm">
                        Cadastrar</a>
                </span>
            </div>

            <div class="card-body">
                @if(session('success'))
                    <div class="alert alert-success" role="alert">
                        {{ session('success') }}
                    </div>
                @endif

                @if(session('error'))
                    <div class="alert alert-danger" role="alert">
                        {{ session('error') }}
                    </div>
                @endif

                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Nome</th>
                            <th scope="col">Preço</th>
                            <th scope="col">Ações</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($courses as $course)
                            <tr>
                                <th scope="row">{{ $course->id }}</th>
                                <td>{{ $course->name }}</td>
                                <td>{{ $course->price }}</td>
                                <td>
                                <span>
                                    <a href="{{ route('course.create', ['course' => $course->id]) }}" class="btn btn-secondary btn-sm">
                                        Visualizar</a>
                                    <a href="{{ route('course.edit', ['course' => $course->id]) }}" class="btn btn-primary btn-sm">
                                        Editar</a>
                                        <form method="POST" action="{{ route('course.destroy', ['course' => $course->id]) }}">
                                            @csrf
                                            @method('delete')
                                            <button class="btn btn-danger btn-sm" type="submit" onclick="return confirm('Tem certeza que desja excluir este registro?')">Apagar</button>
                                        </form>
                                </span>
                                </td>
                            </tr>
                        @empty
                            <div class="alert alert-danger" role="alert">
                                Nenhum curso encontrado!
                            </div>
                        @endforelse
                    </tbody>
                </table>

                {{ $courses->links() }}

            </div>
        </div>

    </div>



        @forelse($courses as $course)
            ID: {{ $course->id }} <br>
            Nome: {{ $course->name }} <br>
            Preço: {{ 'R$ ' .number_format($course->price, 2, ',', '.') }} <br>
            Data do cadastro: {{ \Carbon\Carbon::parse($course->created_at)->tz('America/Sao_paulo')
                ->format('d/m/Y H:i:s') }} <br>
            Editado: {{ \Carbon\Carbon::parse($course->updated_at)->tz('America/Sao_paulo')
                ->format('d/m/Y H:i:s') }} <br><br>
            <a href="{{ route('course.show', ['course' => $course->id]) }}"><button type="button">Visualizar</button></a>
            <a href="{{ route('course.edit', ['course' => $course->id]) }}"><button type="button">Editar</button></a>
            <a href="{{ route('classe.index', ['course' => $course->id]) }}"><button type="button">Visualizar aulas</button></a>
            <form method="POST" action="{{ route('course.destroy', ['course' => $course->id]) }}">
                @csrf
                @method('delete')
                <button type="submit" onclick="return confirm('Tem certeza que desja excluir este registro?')">Apagar</button>
            </form>
            <br><hr>

        @empty
            <p style="color: red;">Nenhum curso encontrado!</p>
        @endforelse

        

@endsection