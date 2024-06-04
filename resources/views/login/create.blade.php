@extends('layouts.login')

@section('content')

<div id="layoutAuthentication">
    <div id="layoutAuthentication_content">
        <main>
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-lg-7">
                        <div class="card shadow-lg border-0 rounded-lg mt-5">
                            <div class="card-header"><h3 class="text-center font-weight-light my-4">Área Restrita</h3></div>
                            <div class="card-body">
                                <x-alert />
                                <form action="{{ route('login.store-user') }}" method="POST">
                                    @csrf
                                    @method('POST')
                                    <div class="form-floating mb-3">
                                        <input class="form-control" id="name" name="name" type="text" value="{{ old('name') }}" placeholder="Nome completo" />
                                        <label for="email">Nome:</label>
                                    </div>
                                    <div class="form-floating mb-3">
                                        <input class="form-control" id="email" name="email" type="email" value="{{ old('email') }}" placeholder="E-mail" />
                                        <label for="email">E-mail</label>
                                    </div>
                                    <div class="form-floating mb-3">
                                    <div class="form-floating mb-3">
                                        <input class="form-control" id="password" type="password" name="password"  value="{{ old('password') }}" placeholder="Senha" />
                                        <label for="password">Senha</label>
                                    </div>
                                    <div class="mt-4 mb-0">   
                                        <div class="d-grid">
                                            <button type="submit" class="btn btn-primary">Criar conta</a>
                                        </div>                                                                         </div>
                                </form>
                            </div>
                            <div class="card-footer text-center py-3">
                                <div class="small">
                                    <a class="text-decoration-none" href="{{ route('login.index') }}">Clique aqui</a> para acessar
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </main>
    </div>
</div>

@endsection