@extends('layouts.login')

@section('content')

<div id="layoutAuthentication">
    <div id="layoutAuthentication_content">
        <main>
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-lg-5">
                        <div class="card shadow-lg border-0 rounded-lg mt-5">
                            <div class="card-header"><h3 class="text-center font-weight-light my-4">Nova senha</h3></div>
                            <div class="card-body">
                                <x-alert />
                                <form action="{{ route('reset-password.submit') }}" method="POST">
                                    @csrf
                                    @method('POST')
                                    <input type="hidden" name="token" value="{{ $token }}" />
                                    <div class="form-floating mb-3">
                                        <input class="form-control" id="email" name="email" type="email" value="{{ old('email') }}" placeholder="Seu E-mail cadastrado" />
                                        <label for="email">E-mail</label>
                                    </div>
                                    <div class="form-floating mb-3">
                                        <input class="form-control" id="password" name="password" type="password" value="{{ old('password') }}" placeholder="Nova senha" />
                                        <label for="email">Nova senha</label>
                                    </div>
                                    <div class="form-floating mb-3">
                                        <input class="form-control" id="password_confirmation" name="password_confirmation" type="password" value="{{ old('password_confirmation') }}" placeholder="Confirmar nova senha" />
                                        <label for="email">Confirmar nova senha</label>
                                    </div>
                                    
                                    <div class="d-flex align-items-center justify-content-between mt-4 mb-0">
                                        <span>Resetar senha</span>
                                        <button type="submit" class="btn btn-primary" onclick="this.innerText = 'Resetando...'">Resetar</a>
                                    </div>
                                </form>
                            </div>
                            <div class="card-footer text-center py-3">
                                <div class="small">Clique aqui <a class="text-decoration-none" href="{{ route('login.index') }}">para acessar</a></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </main>
    </div>
</div>

@endsection