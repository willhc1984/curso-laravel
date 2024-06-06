<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class ForgotPasswordController extends Controller
{
    //Carregar view
    public function showForgotPassword(){
        return view('login.forgotPassword');
    }

    //Receber dados do formulario recuperar senha
    public function submitForgotPassword(Request $request){
        //Validar formulario
        $request->validate([
            'email' => 'required|email',
        ],[
            'email.required' => 'O campo e-mail é obrigatório.',
            'email.email' => 'Necessário enviar e-mail válido.'
        ]);

        //Verificar e-mail existe no banco de dados
        $user = User::where('email', $request->email)->first();
        
        if(!$user){
            //Salvar no log
            Log::warning('Tentativa de recuperar senha com email não válido.');
            //Redirecionar usuariop e enviar mensagem de erro
            return back()->withInput()->with('error', 'E-mail não encontrado!');
        }
        
        dd("Email existe na base de dados!");

    }
}
