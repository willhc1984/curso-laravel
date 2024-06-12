<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;
use App\Http\Requests\LoginUserRequest;
use App\Models\User;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;
use Spatie\Permission\Models\Permission;

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

        //Obter usuario autenticado
        $user = Auth::user();
        $user = User::find($user->id);

        //Verificar se as permissões é Super Admin, tem acsso a todas as paginas
        if($user->hasRole('Super Admin')){
            //Usuario tem todas as permissões
            $permissions = Permission::pluck('name')->toArray();
        }else{
            $permissions = $user->getPermissionsViaRoles()->pluck('name')->toArray();
        }

        //Atribuir as pemissões
        $user->syncPermissions($permissions);

        //Redirecionar usuario
        return redirect()->route('dashboard.index');        
    }

    public function create(){
        //Carregar view
        return view('login.create');
    }

    //Cadastrar no banco de dados
    public function store(LoginUserRequest $request){
        //Validar formulario
        $request->validated();
        
        //Marca inicio da transação
        DB::beginTransaction();

        try{
            //Cadastrar usuario no banco de dados
            $user =  User::create([
                'name' => $request->name, 
                'email' =>  $request->email, 
                'password' => Hash::make($request->password),
            ]);

            //Atribuir papel ao usuário
            $user->assignRole("Aluno");

            //Salvando log
            Log::info('Usuário cadastrado com sucesso!', ['id' => $user->id]);

            //Operação concluida com exito
            DB::commit();
            
            //Redirecionar usuario
            return redirect()->route('login.index')->with('success','Usuário cadastrado com sucesso!');

        }catch(Exception $e){
            //Operação não concluida
            DB::rollBack();
            //Salvando log
            Log::warning('Usuário não cadastrado!', ['error' => $e->getMessage()]);            
            return back()->withInput()->with('error','Usuário não cadastrado!');
        }
    }

    //Deslogar o usuario
    public function destroy(){
        //Desloga o usuario
        Auth::logout();
        //Redireciona com mensagem de sucesso
        return redirect()->route('login.index')->with('success', 'Deslogado com sucesso!');
    }
}
