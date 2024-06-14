<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Spatie\Permission\Models\Role;

class RoleController extends Controller
{
    //Executar o construct quando instanciar a classe - verifica permissão de quem esta logado
    public function __construct(){
        $this->middleware('auth');
        $this->middleware('permission:index-role', ['only' => ['index']]);
    }

    //Listar os papeis
    public function index(){
        //Recuperar os registros do banco de dados
        $roles = Role::orderByDesc('name')->paginate(40);

        //Salvar log
        Log::info('Listar papeis', ['action_user_id' => Auth::id()]);

        //Carrega a view
        return view('roles.index', ['menu' => 'roles', 'roles' => $roles]);
    }

    public function create() {
        dd("teste");
    }
}
