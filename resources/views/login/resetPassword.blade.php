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
                                    <div class="form-floating mb-3">
                                        <input type="text" class="form-control" id="email" name="email"
                                            placeholder="E-mail" value="{{ old('email') }}" />
                                        <label for="email"></label>
                                    </div>
                                    <div class="form-floating mb-3">
                                        <input type="password" class="form-control" id="password" name="password"
                                            placeholder="Nova senha" value="{{ old('password') }}" />
                                        <input type="hidden" name="token" value="{{ $token }}" />
                                        <label for="password"></label>
                                    </div>
                                    <div class="form-floating mb-3">
                                        <input type="password" class="form-control" id="password_confirmation" name="password_confirmation" 
                                            placeholder="Confirmar nova senha"  value="{{ old('password_confirmation') }}" />
                                        <label for="password_confirmation"></label>
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