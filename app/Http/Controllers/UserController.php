<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserRequest;
use App\Models\User;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

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

    //Carregar formulario cadastrar novo usuario
    public function create() {
        //Carregar view
        return view('users.create', ['menu' => 'users']);        
    }

    //Cadastrar usuario no banco de dados
    public function store(UserRequest $request){
        //Validar formulario
        $request->validated();
        //Marca ponto iniical da transação
        DB::beginTransaction();

        try{
            //Cadastrar no banco de dados
            $user = User::create([
                'name' => $request->name,
                'email' => $request->email,
                'password' => $request->password,
            ]);

            //Salvar log
            Log::info('Usuário cadastrado.', ['id' => $user->id, $user]);
            //Operação concluida com exito
            DB::commit();

            //Redireciona usuario e envia mensagem de sucesso
            return redirect()->route('user.show', ['user' => $user->id])->with('success', 'Usuario cadastrado!');

        }catch(Exception $e){

            //Salvar log
            Log::info("Usuário não cadastrado.", ['error' => $e->getMessage()]);

            //Operação nao concluida com exito
            DB::rollBack();

            //Redireciona usuario e envia mensagem de erro
            return back()->withInput()->with('error', 'Usuário não cadastrado.');
        }
    }
}
