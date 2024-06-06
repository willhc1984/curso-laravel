<?php

namespace App\Http\Controllers;

use App\Models\User;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Password;

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
            Log::warning('Tentativa de recuperar senha com email não válido.', ['email' => $request->email]);
            //Redirecionar usuariop e enviar mensagem de erro
            return back()->withInput()->with('error', 'E-mail não encontrado!');
        }
        
        try{
            //Salvar token recuperar senha e enviar e-mail
            $status = Password::sendResetLink(
                $request->only('email')
            );

            //Salvar log
            Log::info('Recuperar senha.', ['resposta' => $status, 'email' => $request->email]);

            //Redirecionar usuario com mensagem de sucesso.
            return redirect()->route('login.index')->with('success', 'Enviado e-mail com instruções para recuperar 
                a senha. Acesse sua caixa de e-mail para recuperar a senha.');
        }catch(Exception $e){
            //Salvar log
            Log::warning('Erro recuperar senha.', ['error' => $e->getMessage(), 
                    'email' => $request->email]);
            //Redirecionar o usuario com mensagem de erro.
            return back()->withInput()->with('error', 'Erro: tente mais tarde.');
        }
    }

    public function showResetPassword(Request $request) {
        dd('Token:' . $request->token);        
    }
}
