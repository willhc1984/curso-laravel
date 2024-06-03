<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    //Listar usuarios
    public function index(){
        //Recuperar os registros no banco de dados
        $users = User::orderByDesc('created_at')->paginate(20);

        //Carregar view
        return view('users.index', ['menu' => 'users', 'users' => $users]);
    }

    //Detalhes do usuario
    public function show(User $user){
        //Carregar view
        return view('users.show', ['menu' => 'users', 'user' => $user]);
    }
}
