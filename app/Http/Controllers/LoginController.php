<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    //Login
    public function index() {
        //Carregar view
        return view('login.index');
    }
    
    //Validar os dados do login
    public function loginProcess(LoginRequest $request) {
        //Validar o formulario
        $request->validated();

        //Validar o usuario no banco de dados
        $authenticated = Auth::attempt(['email' => $request->email, 'password' => $request->password]);

        //Verificar se usuario foi autenticado
        if(!$authenticated){
            //Redirecionar o usuario para pagina anterior e envia mensagem de erro (mensagenm em components - alert)
            return back()->withInput()->with('error', 'E-mail ou senha inválidos');
        }

        //Redirecionar usuario
        return redirect()->route('dashboard.index');
        
        
    }
}
