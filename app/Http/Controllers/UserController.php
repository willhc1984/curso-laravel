<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserRequest;
use App\Models\User;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;
use Spatie\Permission\Models\Role;

class UserController extends Controller
{    
     //Executar construct quando instanciar a classe
     public function __construct(){
        $this->middleware('auth');
        $this->middleware('permission:index-user', ['only' => ['index']]);
        $this->middleware('permission:show-user', ['only' => ['show']]);
        $this->middleware('permission:create-user', ['only' => ['create']]);
        $this->middleware('permission:edit-user', ['only' => ['edit']]);
        $this->middleware('permission:destroy-user', ['only' => ['destroy']]);
    }

    //Listar usuarios
    public function index(){
        //Recuperar os registros no banco de dados
        $users = User::orderByDesc('created_at')->paginate(5);

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
        //Recuperar os papeis
        $roles = Role::pluck('name')->all();
        //Carregar view com opção para associar Role ao usuario
        return view('users.create', [
            'menu' => 'users',
            'roles' => $roles,
        ]);        
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
                'password' => Hash::make($request->password),
            ]);

            //Atribuir papel ao usuário
            $user->assignRole($request->roles);

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

    //Carregar formulario editar usuario 
    public function edit(User $user){
        //Carrega a view
        return view('users.edit', ['menu' => 'users', 'user' => $user]);
    }

    //Editar usuario no banco de dados
    public function update(UserRequest $request, User $user) {
        //Validar formulario
        $request->validated();
        //Ponto inicial da transação
        DB::beginTransaction();

        try{
            //Editar as informação no banco de dados
            $user->update([
                'name' => $request->name,
                'email' => $request->email,
            ]);

            //Salvar log
            Log::info('Usuario editado.', ['id' => $user->id]);
            //Operação é concluida com exito
            DB::commit();

            //Redirecionar usuario e enviar mensagem de sucesso
            return redirect()->route('user.show', ['user' => $request->user])->with('success', 'Usuário editado!');

        }catch(Exception $e){
            //Salvar log
            Log::info('Usuario não editado.', ['error' => $e->getMessage()]);
            //Operação nao concluida
            DB::rollBack();
            //Redireciona com mensagem de erro
            return back()->withInput()->with('error', 'Usuário não editado.');
        }    
    }

    //Carregar formulario de editar senha
    public function editPassword(User $user){
        //Carregar view
        return view('users.editPassword', ['menu' => 'users', 'user' => $user]);
    }

    //Salva senha do usuario
    public function updatePassword(Request $request, User $user){
        //Validar o formulario
        $request->validate([
            'password' => 'required|min:6',
        ],[
            'password.required' => 'O campo senha é obrigatório.',
            'password.min' => 'A senha deve conter no minimo :min caracteres.'
        ]);

        //Inicio da transação
        DB::beginTransaction();

        try{
            //Edita as informações no banco de dados
            $user->update([
                'password' => Hash::make($request->password),
            ]);

            //Salvar log
            Log::info('Senha do usuario editada.');

            //Operação é concluida
            DB::commit();

            //Redireciona ususairo com mensagem de exito
            return redirect()->route('user.show', ['user' => $request->user])->with('success', 'Senha editada!');

        }catch(Exception $e){
            //Salvar log
            Log::info('Senha não editada!', ['error' => $e->getMessage()]);
            //Operação não é concluida
            DB::rollBack();
            //Redireciona usuario com mensagem de erro
            return back()->withInput()->with('error', 'Senha do usuário não editada!');
        }
    }

    //Excluir usuario no banco de dados
    public function destroy(User $user){
        try{
            //Excluir usuario
            $user->delete();
            //Salvar log
            Log::info('Usuario deletado!', ['id' => $user->id]);

            //Redireciona e envia mesnagem de sucesso
            return redirect()->route('user.index')->with('success', 'Usuário exluido!');

        }catch(Exception $e){
            //Salva log
            Log::info('Usuario não excluido', ['error' => $e->getMessage()]);
            //Redireciona com mensagem de erro
            return redirect()->route('user.index')->with('error', 'Usuário não excluido!');
        }
    }

}
